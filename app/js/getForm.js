//
var domain_pref = domain_list.reverse();
console.log(domain_pref);
function similar_text (first, second, percent) {
  
    // verific a validade como string dos valores passados
    if (first === null ||
      second === null ||
      typeof first === 'undefined' ||
      typeof second === 'undefined') {
      return 0
    }
  
    first += ''
    second += ''
  
    // parametros usados
    var pos1 = 0
    var pos2 = 0
    var max = 0
    var firstLength = first.length
    var secondLength = second.length
    var p
    var q
    var l
    var sum
  
    // busca a posição dos caracteres similares e gera um atributo de semelhança apenas pelo comprimento
    for (p = 0; p < firstLength; p++) {
      for (q = 0; q < secondLength; q++) {
        for (l = 0; (p + l < firstLength) && (q + l < secondLength) && (first.charAt(p + l) === second.charAt(q + l)); l++) { // eslint-disable-line max-len
        }
        if (l > max) {
          max = l
          pos1 = p
          pos2 = q
        }
      }
    }
  
    sum = max
    if (sum) {
        if (pos1 && pos2) {
            sum += similar_text(first.substr(0, pos1), second.substr(0, pos2))
        }
        
        // analise de casos da substrings e suas semelhanas gerando um valor de semlehança
      if ((pos1 + max < firstLength) && (pos2 + max < secondLength)) {
        sum += similar_text(
          first.substr(pos1 + max, firstLength - pos1 - max),
          second.substr(pos2 + max,
          secondLength - pos2 - max))
      }
    }
  
    if (!percent) {
      return sum
    }
  
    return (sum * 200) / (firstLength + secondLength)
  }

// validando email dessa vez por jquerry
$(document).ready(function() { // ao iniciar o documento...
    $('form').keyup(function() { // se realizado click...
      var mail = $('#mail').val(); // pega o valor do input
      // captura o dominio
      var domain = mail.substr(mail.indexOf("@")+1,mail.lenght);
      compout = valid = mostcomp = null;
      domain_list.forEach(element => {
        if (element == domain) {
          valid = true;
                compout = domain;
                $('#_teste').html("O domínio está correto: "+compout); // insere no document
            }
          });
          if (valid != true) {
            domain_list.forEach(domain_src => {
              if (similar_text(domain,domain_src) > mostcomp) {
                mostcomp = similar_text(domain,domain_src);
                compout = domain_src;
              } else if (similar_text(domain,domain_src) == mostcomp) {
                domain_pref.forEach(ele_pref => {
                  if (domain == ele_pref || compout == ele_pref) {
                    compout == ele_pref;
                  }
                });
              }
            });
            novo_mail = mail.substr(0,mail.indexOf("@")+1)+compout;
            user = mail.substr(0,mail.indexOf("@")+1);
            $('#_teste').html("Foi constatado erro , logo substituiu-se: "+mail+" por: "+novo_mail); // insere no document
            
          }
          console.log(valid);
           });           
        });

      
      