from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('adicionarEmail/', views.adicionarEmail, name="adicionarEmail"),
    path('lerArquivos/', views.lerArquivos, name="lerArquivos"),
]