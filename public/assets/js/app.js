document.addEventListener('DOMContentLoaded', () => {

  /* ======================================================
   * MOBILE MENU
   * ====================================================== */
  const menuBtn   = document.getElementById('menuBtn');
  const closeBtn  = document.getElementById('closeBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('hidden');
      mobileMenu.classList.add('flex');
    });
  }

  if (closeBtn && mobileMenu) {
    closeBtn.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
      mobileMenu.classList.remove('flex');
    });
  }

  /* ======================================================
   * NAVBAR ACTIVE STATE (SCROLL SPY)
   * ====================================================== */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  function updateActiveNav() {
    const scrollPosition = window.scrollY + 120;

    sections.forEach(section => {
      const sectionTop    = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId     = section.getAttribute('id');

      if (
        scrollPosition >= sectionTop &&
        scrollPosition < sectionTop + sectionHeight
      ) {
        navLinks.forEach(link => {
          link.classList.remove('text-lime-400');
          link.classList.add('text-white/70');

          if (link.getAttribute('href') === `#${sectionId}`) {
            link.classList.add('text-lime-400');
            link.classList.remove('text-white/70');
          }
        });
      }
    });
  }

  window.addEventListener('scroll', updateActiveNav);
  updateActiveNav();

  /* ======================================================
   * BACK TO TOP BUTTON + SCROLL PROGRESS
   * ====================================================== */
  const backToTopBtn = document.getElementById('backToTop');
  const progressCircle = document.getElementById('progressCircle');
  const radius = 45;
  const circumference = 2 * Math.PI * radius;

  if (backToTopBtn && progressCircle) {
    progressCircle.style.strokeDasharray = circumference;

    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const maxScroll =
        document.documentElement.scrollHeight - window.innerHeight;

      const progress = maxScroll > 0 ? scrollTop / maxScroll : 0;
      const offset = circumference * (1 - progress);

      progressCircle.style.strokeDashoffset = offset;

      if (scrollTop > 300) {
        backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
      } else {
        backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
      }
    });

    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
  

});
