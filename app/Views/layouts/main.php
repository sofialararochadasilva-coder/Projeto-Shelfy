<?php
// Detecta a rota atual para destacar o item ativo no menu lateral
$rotaAtual = trim($_GET['url'] ?? 'home/index', '/');

// Dados temporários do usuário (nas próximas etapas virão da $_SESSION / Banco)
$nomeUsuario = $_SESSION['usuario_nome'] ?? 'Marina Alves';
$avatarUsuario = $_SESSION['usuario_avatar'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop';
$qtdLeiturasAtivas = $qtdLeiturasAtivas ?? 3;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($tituloPagina ?? 'Shelfy — Seu Reino de Leitura') ?></title>

  <!-- Bootstrap 5 CSS e Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS Oficial do Shelfy -->
  <link rel="stylesheet" href="<?= e(asset('css/estilo.css')) ?>">
</head>

<body>

  <!-- Barra Superior visível APENAS no celular/tablet (< 992px) para abrir o menu -->
  <header class="shelfy-mobile-header d-lg-none">
    <button class="btn shelfy-btn-menu-mobile" type="button" id="btnAbrirSidebar" aria-label="Abrir menu">
      <i class="bi bi-list fs-4"></i>
    </button>
    <a href="<?= BASE_URL ?>/home/index" class="shelfy-brand-mobile">
      <i class="bi bi-book"></i>
      <span>shelfy</span>
    </a>
    <div style="width: 38px;"></div> <!-- Espaçador para centralizar a logo -->
  </header>

  <!-- Fundo escuro ao abrir menu no celular -->
  <div class="shelfy-backdrop" id="shelfyBackdrop"></div>

  <div class="shelfy-app-wrapper">
    <!-- ==========================================
         BARRA LATERAL FIXA (VERDE FLORESTA)
         ========================================== -->
    <aside class="shelfy-sidebar" id="shelfySidebar">
      <!-- Logo Shelfy -->
      <div class="shelfy-sidebar-header">
        <a href="<?= BASE_URL ?>/home/index" class="shelfy-brand">
          <span class="shelfy-brand-icon">
            <i class="bi bi-book"></i>
          </span>
          <span class="shelfy-brand-text">shelfy</span>
        </a>
        <button class="btn text-white d-lg-none p-0" id="btnFecharSidebar" aria-label="Fechar menu">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <!-- Navegação Principal -->
      <nav class="shelfy-nav flex-grow-1">
        <div class="shelfy-nav-label">SEU REINO</div>

        <ul class="shelfy-nav-list">
          <li>
            <a href="<?= BASE_URL ?>/home/index"
               class="shelfy-nav-link <?= str_starts_with($rotaAtual, 'home') ? 'active' : '' ?>">
              <i class="bi bi-house-door"></i>
              <span>Início</span>
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>/acervo/index"
               class="shelfy-nav-link <?= str_starts_with($rotaAtual, 'acervo') ? 'active' : '' ?>">
              <i class="bi bi-journal-bookmark"></i>
              <span>Acervo</span>
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>/home/index#leituras-andamento"
               class="shelfy-nav-link">
              <i class="bi bi-book"></i>
              <span>Minhas leituras</span>
              <?php if ($qtdLeiturasAtivas > 0): ?>
                <span class="shelfy-badge-terracota ms-auto"><?= (int)$qtdLeiturasAtivas ?></span>
              <?php endif; ?>
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>/user/perfil"
               class="shelfy-nav-link <?= str_starts_with($rotaAtual, 'user/perfil') ? 'active' : '' ?>">
              <i class="bi bi-person"></i>
              <span>Meu perfil</span>
            </a>
          </li>
        </ul>

        <!-- Card de Citação Filosófica -->
        <div class="shelfy-quote-card mt-4">
          <i class="bi bi-stars shelfy-quote-icon"></i>
          <p class="shelfy-quote-text">
            “Conhecer a si mesmo é o começo de toda sabedoria.”
          </p>
          <span class="shelfy-quote-author">— Aristóteles</span>
        </div>
      </nav>

      <!-- Rodapé da Sidebar (Sair + Mini Perfil) -->
      <div class="shelfy-sidebar-footer">
        <a href="<?= BASE_URL ?>/auth/logout" class="shelfy-nav-link mb-2">
          <i class="bi bi-box-arrow-left"></i>
          <span>Sair do reino</span>
        </a>

        <a href="<?= BASE_URL ?>/user/perfil" class="shelfy-user-mini">
          <img src="<?= e($avatarUsuario) ?>" alt="Avatar de <?= e($nomeUsuario) ?>" class="shelfy-user-avatar">
          <span class="shelfy-user-name text-truncate"><?= e($nomeUsuario) ?></span>
          <i class="bi bi-chevron-down ms-auto small opacity-75"></i>
        </a>
      </div>
    </aside>

    <!-- ==========================================
         ÁREA PRINCIPAL DE CONTEÚDO (PAPEL CREME)
         ========================================== -->
    <main class="shelfy-main-content">
      <?= $content ?>
    </main>
  </div>

  <!-- Bootstrap 5 JS Bundle + Script do Shelfy -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= e(asset('js/app.js')) ?>"></script>
</body>

</html>