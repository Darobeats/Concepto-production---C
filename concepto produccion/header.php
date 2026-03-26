<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Agencia de eventos corporativos en Colombia con más de 10 años de experiencia. Producción de eventos, activaciones de marca, video corporativo y alquiler de equipos. Clientes como PONAL, Colsubsidio, Cafam y más.">
  <meta name="keywords" content="empresa eventos corporativos Colombia, producción eventos Bogotá, activaciones de marca, alquiler equipos eventos, producción video corporativo, eventos empresariales Colombia, Jessi Uribe, Yo Me Llamo">
  <meta property="og:title" content="Concepto & Producción | Eventos y Experiencias Corporativas en Colombia">
  <meta property="og:description" content="Más de 10 años diseñando experiencias corporativas memorables. Eventos para más de 3.000 personas, artistas como Jessi Uribe, clientes como PONAL y Colsubsidio.">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/image1.jpg">
  <meta property="og:url" content="<?php echo home_url('/'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_CO">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="canonical" href="<?php echo home_url('/'); ?>">
  <title>Concepto &amp; Producción | Eventos y Experiencias Corporativas en Colombia</title>
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"EventPlanner",
    "name":"Concepto & Producción",
    "description":"Agencia de eventos corporativos y experiencias en Colombia con más de 10 años de trayectoria. Eventos para empresas, conciertos, activaciones de marca, producción de video y alquiler de equipos.",
    "url":"https://www.conceptoyproduccion.com",
    "telephone":"+573505175312",
    "email":"info@conceptoyproduccion.com",
    "address":{"@type":"PostalAddress","addressCountry":"CO","addressRegion":"Bogotá D.C."},
    "areaServed":"Colombia",
    "foundingDate":"2014",
    "numberOfEmployees":{"@type":"QuantitativeValue","value":"10"},
    "knowsAbout":["Eventos corporativos","Producción de video","Activaciones de marca","Alquiler de equipos audiovisuales","Conciertos","Convenciones"],
    "hasOfferCatalog":{
      "@type":"OfferCatalog",
      "name":"Servicios de Producción de Eventos",
      "itemListElement":[
        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Eventos & Activaciones"}},
        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Producción & Edición de Video"}},
        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Virtual & Digital"}},
        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Alquiler de Equipos"}}
      ]
    }
  }
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header">
  <div class="site-logo">
    <a href="<?php echo home_url('/'); ?>" aria-label="Concepto & Producción - Inicio">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png"
           alt="Concepto & Producción"
           width="160" height="118"
           id="header-logo">
    </a>
  </div>

  <nav id="main-nav" role="navigation" aria-label="Menú principal">
    <ul>
      <li><a href="#hero">Inicio</a></li>
      <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
      <li class="has-dropdown">
        <a class="dropdown-toggle" href="#servicios" aria-haspopup="true">
          Servicios <span class="arrow" aria-hidden="true">▾</span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#servicios">Eventos &amp; Activaciones</a></li>
          <li><a href="#servicios">Producción &amp; Edición de Video</a></li>
          <li><a href="#servicios">Virtual &amp; Digital</a></li>
          <li><a href="#servicios">Alquiler de Equipos</a></li>
        </ul>
      </li>
      <li><a href="#proceso">Proceso</a></li>
      <li><a href="#clientes">Clientes</a></li>
      <li><a href="#contacto">Contacto</a></li>
    </ul>
  </nav>

  <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>
