# Email Data 

Developed in Django and Bootstrap <br/>

First of all add this key in the settings.py file <br/>

SECRET_KEY='1irjgo=@od_#m-9nb80_$e4yzee^&&i&hm*radm*ygy^s!2*_z'  <br/>

In case you wish to run this application in localhost
you must uncomment and setting up the variables according your 
database:

#DATABASES = { <br/>
    #'default': { <br/>
        #'ENGINE': 'django.db.backends.postgresql_psycopg2', <br/>
        #'NAME': 'statistic', <br/>
        #'USER': 'YOUR-USER', <br/>
        #'PASSWORD': 'YOUR-PASSWORD', <br/>
       #'HOST': 'localhost', <br/>
        #'PORT': '5432', <br/>
    #}<br/>
#}

In case you wish to run this application in a cloud server host <br/>
you need create and setting up a .env file with with the <br/>
following variables: <br/>
SECRET_KEY = 'secret key of your project' (settings.py) <br/>
DEBUG = 'False or True'<br/>
DATABASE_URL= 'url from your database cloud server.<br/>


after all set up, you need to run <br/>
python manage.py makemigrations <br/>
after that run <br/>
python manage.py migrate


So enjoy this application !!!




