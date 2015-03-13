# Pinged.PHP

Lightweight logging service written in PHP. Easily log events from other applications and servers using a simple HTTP interface.

## Usage

Pinged runs fine on the free Heroku stack using the free PostgreSQL add-on. Please make sure you have a correct configured `DATABASE_URL` config variable. For authenticating your logging requests, please add a config variable called `PINGED_AUTH` as well. 

### Database

Create the following PostgreSQL database in your heroku database:

```sql
CREATE TABLE LOG (
   ID         SERIAL PRIMARY KEY      NOT NULL,
   TIME       timestamp without time zone DEFAULT now(),
   CATEGORY   CHAR(50) NOT NULL,
   ACTION     CHAR(50) NOT NULL,
   KEY        CHAR(50) NOT NULL,
   VALUE      CHAR(50) NOT NULL
)
```

### Logging

```bash
$ > curl http://pinged.herokuapp.com/category/action/key/value -H 'X-Pinged-Auth:YOUR_PINGED_AUTH_KEY'
```