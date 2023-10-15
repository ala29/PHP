
function verifcreer(mdp)
{
	
	nom=document.creer_compte.nom.value;
	prenom=document.creer_compte.prenom.value;
	universite=document.creer_compte.université.value;
	
	if(nom.length<3)
	{
		alert('veuiller saisir votre nom');
		document.creer_compte.nom.focus();
		return false;
	}
	else if(prenom.length<3)
	{
		alert('veuiller saisir votre prenom');
		document.creer_compte.prenom.focus();
		return false;
	}
	else if(universite.length<1)
	{
		alert('veuiller saisir votre établissement universitaire');
		document.creer_compte.université.focus();
		return false;
	}
	
	else
	
	var cont=/(?=.*[A-Z]) (?=.*[a-z]) (?=.*\d) (?=.*[&#($_)!])/;
	// upper case | lower case | digite | symbols
	
	if(mdp.value.length<8)
	{
		alert('le mot de passe doit contenir au moins 8 caracteres');
		mdp.focus();
		return false;
	}
	else if(!mdp.value.match(cont))
	{
		alert("Le mot de passe " + mdp.value + "doit contenir au moin un chaine de caractére special et une majuscule !");
		mdp.focus;
		return false;
	}
	else
	{
		alert('Bienvenue ' + nom + ' ' + prenom);
		return true;
	}
}

// function verifmdp(mdp)
// {
		// if(mdp.value.length<8)
	// {
		// alert('le mot de passe doit contenir au moins 8 caracteres');
		// mdp.focus();
		// return false;
	// }
// }