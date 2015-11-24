<?php 
namespace App\Providers;

use Storage;
use League\Flysystem\Filesystem;
use Dropbox\Client as DropboxClient;
use League\Flysystem\Dropbox\DropboxAdapter;
use Illuminate\Support\ServiceProvider;

class DropboxFilesystemServiceProvider extends ServiceProvider {

    public function boot()
    {
        Storage::extend('gcs', function($app, $config)
        {
            $client = new Google_Client($config['accessToken'], $config['clientIdentifier']);
            $client->setApplicationName("Lanoda");
            $client->setClientId($config['client_id']);
            $client->setClientSecret($config['client_secret']);
			$client->setRedirectUri($config['redirect_uri']);
			$client->setDeveloperKey('api_key');
			$client->setScopes('https://www.googleapis.com/auth/devstorage.full_control');

            return new Filesystem(new Google_Service_Storage($client));
        });
    }

    public function register()
    {
        //
    }

}

