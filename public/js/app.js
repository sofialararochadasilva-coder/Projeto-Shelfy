document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form[data-validate]');
    if (!form) return;

    form.addEventListener('submit', function (ev) {
        var email = form.querySelector('[name="email"]');
        if (email && email.value.indexOf('@') === -1) {
            ev.preventDefault();
            alert('Informe um e-mail válido.');
            email.focus();
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('shelfySidebar');
    const backdrop = document.getElementById('shelfyBackdrop');
    const btnAbrir = document.getElementById('btnAbrirSidebar');
    const btnFechar = document.getElementById('btnFecharSidebar');

    function abrirMenu() {
        if (sidebar && backdrop) {
            sidebar.classList.add('aberta');
            backdrop.classList.add('show');
        }
    }

    function fecharMenu() {
        if (sidebar && backdrop) {
            sidebar.classList.remove('aberta');
            backdrop.classList.remove('show');
        }
    }

    if (btnAbrir) btnAbrir.addEventListener('click', abrirMenu);
    if (btnFechar) btnFechar.addEventListener('click', fecharMenu);
    if (backdrop) backdrop.addEventListener('click', fecharMenu);
});