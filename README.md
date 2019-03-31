# Email Data 

Developed in Django and Bootstrap 

In case you wish to run this application in localhost
you must uncomment :

#DATABASES = { <br/>
    #'default': { <br/>
        #'ENGINE': 'django.db.backends.postgresql_psycopg2', <br/>
        #'NAME': 'statistic', <br/>
        #'USER': 'usuario', <br/>
        #'PASSWORD': '12345', <br/>
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




