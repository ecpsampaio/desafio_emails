# Email Data 

Developed in Django and Bootstrap 

In case you wish to run this application in localhost
you must uncomment :

#DATABASES = {
    #'default': {
        #'ENGINE': 'django.db.backends.postgresql_psycopg2',
        #'NAME': 'statistic',
        #'USER': 'usuario',
        #'PASSWORD': '12345',
       #'HOST': 'localhost',
        #'PORT': '5432',
    #}
#}

In case you wish to run this application in a cloud server
you need create and setting up a .env file with with the 
following variables:
SECRET_KEY = 'secret key of your project' (settings.py)
DEBUG = 'False or True'
DATABASE_URL= 'url from your database cloud server.




