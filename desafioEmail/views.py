from django.shortcuts import render
from django.http import HttpResponse
from django.shortcuts import render_to_response
from fuzzywuzzy import fuzz
from fuzzywuzzy import process
import matplotlib.pyplot as plt
import pandas as pd

# Create your views here.

def index(request):
    return render(request, 'index.html')


def lerArquivos(request):
    dominios = 'C:/xampp/htdocs/desafio_emails/domain_list.csv'
    emails = 'C:/xampp/htdocs/desafio_emails/email_list.csv'

    dadosDominios = []
    novoDadosDominios = []
    dadosEmails = []
    novosDadosEmails = []

    lista_dominios = pd.read_csv(dominios, names=['Domain'])
    lista_emails = pd.read_csv(emails, names=["E-mails"])
    total = lista_emails.shape[0]
    #.POST['email']
    if request != "":
        emailAdicionado = request
        lista_emails.loc[total+1] = emailAdicionado
        total = lista_emails.shape[0]
    else:
        emailAdicionado = ""


    for (i, row) in lista_dominios.itertuples():
        dadosDominios.append(row)

    for dominio in dadosDominios:
        itemDominio = dominio
        for y in ["'"]:
            item = itemDominio.replace(y, "")
            novoDadosDominios.append(item)

    for (j, linha) in lista_emails.itertuples():
        dadosEmails.append(linha)

    for emailList in dadosEmails:
        itemEmail = emailList
        for z in ["'"]:
            addEmail = itemEmail.replace(z, "")
            novosDadosEmails.append(addEmail)

    listEmailCerto = []
    listEmailErrado = []
    for i in novosDadosEmails:
        resultado = i.split("@")
        email = i

        if resultado[1] in novoDadosDominios:
            listEmailCerto.append(email)
        else:
            listEmailErrado.append(email)

    totalErrados = len(listEmailErrado)
    totalCertos = len(listEmailCerto)
    corrigidos = []

    for i in listEmailErrado:
        resultadoErrado = i.split("@")
        z = process.extractOne(resultadoErrado[1], novoDadosDominios, scorer=fuzz.token_sort_ratio)
        resultadoErrado[1] = z[0]
        corrigidos.append(resultadoErrado[0] + '@' + resultadoErrado[1])

    gmail = []
    hotmail = []
    hotmailBr = []
    hotmailMX = []
    hotmailAr = []
    msn = []
    gmailStr = 'gmail.com'
    hotmailStr = 'hotmail.com'
    hotmailBrStr = 'hotmail.com.br'
    hotmailMXStr = 'hotmail.com.mx'
    hotmailArStr = 'hotmail.com.ar'
    msnStr = 'msn.com'
    dictErrado = {}
    dictCerto ={}
    contCerto = 0
    contErrado = 0

    for corrigido in corrigidos:
        resultDominio = process.extractOne(corrigido, corrigidos, scorer=fuzz.token_sort_ratio)
        dominioSep = resultDominio[0].split("@")
        if dominioSep[1] == gmailStr:
            gmail.append(corrigido)
        elif dominioSep[1] == hotmailStr:
            hotmailBr.append(corrigido)
        elif dominioSep[1] == hotmailMXStr:
            hotmailMX.append(corrigido)
        elif dominioSep[1] == hotmailArStr:
            hotmailAr.append(corrigido)
        elif dominioSep[1] == msnStr:
            msn.append(corrigido)
        else:
            hotmail.append(corrigido)

    for emailCorrigido in corrigidos:
        login = emailCorrigido.split("@")
        loginFinal = login[0].split("'")
        tamLogin = len(loginFinal[1])
        dictErrado[contErrado] = tamLogin
        #listErrado[cont] = loginFinal[1]
        contErrado = contErrado+1
        #print(dictErrado)

    for emailCerto in listEmailCerto:
        loginCerto = emailCerto.split("@")
        LoginCertoFinal = loginCerto[0].split("'")
        tamLoginCerto = len(LoginCertoFinal[1])
        dictCerto[contCerto] = tamLoginCerto
        contCerto = contCerto +1

    domains = ['Gmail', 'Hotmail', 'HotmailBr', 'HotmailMx', 'HotmailAr', 'Msn']
    countDomains = [len(gmail),  len(hotmail), len(hotmailBr), len(hotmailMX), len(hotmailAr), len(msn)]
    descricaoX = 'Domínios'
    descricaoY = 'Quantidades de erros de escrita'

    #plotarGraficos(domains, countDomains, descricaoX, descricaoY)
    #plotarGraficos(dictCerto.values(), descricaoX,domains, 'Tamanho do login')

    return {'countDomains': countDomains,
                   'totalEmails': total,
                   'totalCertos':totalCertos,
                   'totalErrados': totalErrados,
                   'emailAdicionado': emailAdicionado}

def plotarGraficos(x, y, xLbael, yLabel):
    #plt.plot(x, y)

    #plt.show()
    plt.scatter(x=x, y=y)
    plt.xlabel(xLbael)
    plt.ylabel(yLabel)
    plt.grid(True)
    plt.show()

def adicionarEmail(request):
    if request.method == 'POST':
        results = lerArquivos(request)

    return render(request, 'resultados.html',{'results' : results})


lerArquivos('"'"slrocha@gmail.com"'"')
