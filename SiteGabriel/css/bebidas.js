function enterSite() {
	document.getElementById('age-popup').style.display = 'none';
	localStorage.setItem('isOfAge', 'true');
 }
 
 // Função para redirecionar para outra página ou fechar a janela
 function exitSite() {
	window.location.href = 'https://www.google.com';
 }
 
 // Verifica se o usuário já confirmou a idade anteriormente
 window.onload = function() {
	if (localStorage.getItem('isOfAge') !== 'true') {
	  document.getElementById('age-popup').style.display = 'flex';
	} else {
	  document.getElementById('age-popup').style.display = 'none';
	}
 }