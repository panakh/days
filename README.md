# Days Challenge
Calculate days in months, UTC offset etc.

## server
```
symfony serve -d
symfony open:local
```

Form at root path /

Usually at http://127.0.0.1:8000/ if no other servers are running

## Run tests
bin/phpunit to run tests


Couldn't really figure out why UTC offset is *270* in the given output, when calculated it is *276* for below input


```
Form input:
date=1853-01-30
timezone=America/Lower_Princes

```