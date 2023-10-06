/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function toggleDescription() {
    const description = document.querySelector('.description');
    const moreButton = document.querySelector('.more-button');
    console.log('Button clicked');
   
    description.classList.toggle('show-description');
    
    if (description.classList.contains('show-description')) {
      moreButton.textContent = 'Less About Me';
    } else {
      moreButton.textContent = 'More About Me';
    }
  }
