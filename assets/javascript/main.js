let heart = document.querySelector('.like img');
let heart1 = 'http://localhost:8000/assets/icons/heart1.png';
let heart2 = 'http://localhost:8000/assets/icons/heart2.png';


heart.addEventListener('click', () => {
    if (heart.src == heart1) {
        heart.src = heart2;
    } else if (heart.src == heart2) {
        heart.src = heart1;
    }
});

function incrementLikeCount(articleId) {
    // Envoyer une requête HTTP POST au serveur pour incrémenter le compteur de likes
    // Exemple avec la méthode fetch() pour effectuer la requête
    fetch(`/articles/${articleId}/like`, {
      method: 'POST'
    })
    .then(response => {
      // Gérer la réponse du serveur
      if (response.ok) {
        console.log('Le compteur de likes a été incrémenté avec succès.');
      } else {
        console.error('Une erreur s\'est produite lors de l\'incrémentation du compteur de likes.');
      }
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la requête :', error);
    });
  }
  
  function decrementLikeCount(articleId) {
    // Envoyer une requête HTTP POST au serveur pour décrémenter le compteur de likes
    // Exemple avec la méthode fetch() pour effectuer la requête
    fetch(`/articles/${articleId}/unlike`, {
      method: 'POST'
    })
    .then(response => {
      // Gérer la réponse du serveur
      if (response.ok) {
        console.log('Le compteur de likes a été décrémenté avec succès.');
      } else {
        console.error('Une erreur s\'est produite lors de la décrémentation du compteur de likes.');
      }
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la requête :', error);
    });
  }