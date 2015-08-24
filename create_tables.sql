-- Tags
DROP TABLE tag CASCADE;
CREATE TABLE tag (
	tag_id serial PRIMARY KEY,
	name varchar (100) NOT NULL,
	color varchar (50),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

-- Images
DROP TABLE image CASCADE;
CREATE TABLE image (
	image_id serial PRIMARY KEY,
	file_url varchar (500) NOT NULL,
	name varchar (100),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);


-- Contacts
DROP TABLE contact_type CASCADE;
CREATE TABLE contact_type (
	contact_type_id serial PRIMARY KEY,
	type_name varchar (100) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

DROP TABLE contact CASCADE;
CREATE TABLE contact (
	contact_id serial PRIMARY KEY,
	contact_type_id integer NOT NULL REFERENCES contact_type (contact_type_id),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

DROP TABLE contact_image CASCADE;
CREATE TABLE contact_image (
	contact_id integer NOT NULL REFERENCES contact (contact_id),
	image_id integer NOT NULL REFERENCES image (image_id),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE,

	PRIMARY KEY (contact_id, image_id)
);


-- Notes
DROP TABLE note_type CASCADE;
CREATE TABLE note_type (
	note_type_id serial PRIMARY KEY,
	type_name varchar (100),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

DROP TABLE note CASCADE;
CREATE TABLE note (
	note_id serial PRIMARY KEY,
	note_type_id integer NOT NULL REFERENCES note_type (note_type_id),
	title varchar (100),
	body varchar (100),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

DROP TABLE note_tag CASCADE;
CREATE TABLE note_tag (
	note_id integer NOT NULL REFERENCES note (note_id),
	tag_id integer NOT NULL REFERENCES tag (tag_id),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE,

	PRIMARY KEY (note_id, tag_id)
);

DROP TABLE note_image CASCADE;
CREATE TABLE note_image (
	note_id integer NOT NULL REFERENCES note (note_id),
	image_id integer NOT NULL REFERENCES image (image_id),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE,

	PRIMARY KEY (note_id, image_id)
);


-- Accounts and Users
DROP TABLE users CASCADE;
CREATE TABLE users (
	user_id serial PRIMARY KEY,
	profile_image_id integer REFERENCES image (image_id),
	first_name varchar (50),
	last_name varchar (50),
	email varchar (500) UNIQUE NOT NULL,
	password varchar (50) NOT NULL,
	last_login timestamp,
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE
);

DROP TABLE user_note CASCADE;
CREATE TABLE user_note (
	user_id integer NOT NULL REFERENCES users (user_id),
	note_id integer NOT NULL REFERENCES note (note_id),
	created_at timestamp NOT NULL DEFAULT CURRENT_DATE,
	updated_at timestamp DEFAULT CURRENT_DATE,

	PRIMARY KEY (user_id, note_id)
);

