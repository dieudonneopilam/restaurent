import './bootstrap';
import Chart from 'chart.js/auto';

(function(){
    var ListMenuUser = document.querySelectorAll('.menu-user');
    for (let index = 0; index < ListMenuUser.length; index++) {
        const MenuUser = ListMenuUser[index];

        MenuUser.addEventListener('click', function(){
            var menu = this.parentNode.querySelector('.menu-edit')
            menu.classList.toggle('hidden')
            menu.classList.toggle('flex')
        });
    }
})()
