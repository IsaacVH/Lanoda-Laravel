
<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
		<!-- Title -->
		<span class="mdl-layout-title"><img class="lanoda-header-logo" src="/img/logo/lanoda-logo-white.png" /></span>
		<!-- Add spacer, to align navigation to the right -->
		<div class="mdl-layout-spacer"></div>
		<!-- Navigation. We hide it in small screens. -->
		<div class="search-bar" style="height: 32px; margin-right: 8px;">
			<form action="#">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="padding: 0;">
					<label class="mdl-button mdl-js-button mdl-button--icon" for="search" style="bottom: 0;">
						<i class="material-icons">search</i>
					</label>
					<div class="mdl-textfield__expandable-holder">
						<input class="mdl-textfield__input" type="text" name="search" id="search" />
						<label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
					</div>
				</div>
			</form>
		</div>
		<div class="profile-icon">
			<button id="headerProfileOptions" class="mdl-button mdl-js-button mdl-button--icon">
				@if (isset($user) && $user->image != null)
					<img src='{{ $user->image->file_url }}'; ?> />
				@else
					<i class="material-icons md-30" style="margin-left: -3px">person</i>
				@endif
			</button>
			<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="headerProfileOptions">
				<li class="mdl-menu__item" style="text-align: center;"><a class="normalize-link" href="/auth/account">Account</a></li>
				<li class="mdl-menu__item" style="text-align: center;"><a class="normalize-link" href="/auth/logout">Log Out</a></li>
			</ul>
		</div>
	</div>
</header>

