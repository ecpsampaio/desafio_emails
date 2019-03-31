# Email Data 

Developed in Django and Bootstrap <br/>

1 - First of all add this key in the settings.py file <br/>

SECRET_KEY='1irjgo=@od_#m-9nb80_$e4yzee^&&i&hm*radm*ygy^s!2*_z'  <br/>

2 - In case you wish to run this application in localhost
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

3 - In case you wish to run this application in a cloud server host <br/>
you need create and setting up a .env file with with the <br/>
following variables: <br/>
SECRET_KEY = 'secret key of your project'  (STEP 1) <br/>
DEBUG = 'False or True'<br/>
DATABASE_URL= 'url from your database cloud server.<br/>


4 - After all set up, you need to run: <br/>
- Install all dependences in the requirements.txt file <br/>
- Run python manage.py makemigrations <br/>
- Run python manage.py migrate


So enjoy this application !!!




