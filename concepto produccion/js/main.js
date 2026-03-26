/* Concepto & Producción — main.js v2.0 */

document.addEventListener('DOMContentLoaded', function () {

  // ===== Sticky Header =====
  var header = document.getElementById('site-header');
  function onScroll() {
    if (window.scrollY > 70) header.classList.add('scrolled');
    else header.classList.remove('scrolled');
  }
  window.addEventListener('scroll', onScroll, { passive: true });

  // ===== Mobile Menu =====
  var toggle = document.getElementById('menu-toggle');
  var nav    = document.getElementById('main-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
      var spans = toggle.querySelectorAll('span');
      if (open) {
        spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
      } else {
        spans[0].style.transform = '';
        spans[1].style.opacity   = '';
        spans[2].style.transform = '';
      }
    });

    nav.querySelectorAll('a:not(.dropdown-toggle)').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        var spans = toggle.querySelectorAll('span');
        spans[0].style.transform = '';
        spans[1].style.opacity   = '';
        spans[2].style.transform = '';
      });
    });
  }

  // ===== Service Tabs =====
  var tabBtns     = document.querySelectorAll('.tab-btn');
  var tabContents = document.querySelectorAll('.tab-content');

  tabBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var target = btn.getAttribute('data-tab');
      tabBtns.forEach(function (b) { b.classList.remove('active'); b.setAttribute('aria-selected','false'); });
      tabContents.forEach(function (c) { c.classList.remove('active'); });
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');
      var content = document.getElementById('tab-' + target);
      if (content) content.classList.add('active');
    });
  });

  // ===== Smooth Scroll =====
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var id = this.getAttribute('href');
      if (id === '#' || id === '#!') return;
      var el = document.querySelector(id);
      if (el) {
        e.preventDefault();
        var offset = header ? header.offsetHeight + 8 : 0;
        var top = el.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  // ===== Counter Animation =====
  function animateCounter(el) {
    var target  = parseInt(el.getAttribute('data-target'), 10);
    var suffix  = el.getAttribute('data-suffix') || '';
    var duration = 1800;
    var start   = null;

    function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }

    function step(ts) {
      if (!start) start = ts;
      var progress = Math.min((ts - start) / duration, 1);
      var value    = Math.round(easeOutQuart(progress) * target);
      el.textContent = value.toLocaleString('es-CO') + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }

    requestAnimationFrame(step);
  }

  var counters = document.querySelectorAll('.stat-number[data-target]');
  if (counters.length) {
    var counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(function (c) { counterObserver.observe(c); });
  }

  // ===== Scroll Reveal =====
  var revealEls = document.querySelectorAll(
    '.feature-item, .mv-box, .valor-item, .proceso-step, .proceso-circle, .gallery-item, .cliente-item, .exp-stat'
  );

  var revealObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.style.opacity   = '1';
        entry.target.style.transform = 'translateY(0)';
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  revealEls.forEach(function (el, i) {
    el.style.opacity   = '0';
    el.style.transform = 'translateY(22px)';
    el.style.transition = 'opacity 0.55s ease ' + (i % 4 * 0.08) + 's, transform 0.55s ease ' + (i % 4 * 0.08) + 's';
    revealObserver.observe(el);
  });

});
