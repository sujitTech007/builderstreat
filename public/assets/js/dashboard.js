(() => {
  const sidebar = document.querySelector(".sidebar");
  const menuBtn = document.querySelector("[data-menu]");
  const toast = document.querySelector(".toast");
  const search = document.querySelector("[data-table-search]");
  const table = document.querySelector("[data-table]");

  if (menuBtn && sidebar) {
    menuBtn.addEventListener("click", () => sidebar.classList.toggle("open"));
  }

  document.querySelectorAll("[data-submenu]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const id = btn.getAttribute("data-submenu");
      document.getElementById(id)?.classList.toggle("open");
    });
  });

  if (search && table) {
    search.addEventListener("input", () => {
      const q = search.value.toLowerCase();
      table.querySelectorAll("tbody tr").forEach((row) => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? "" : "none";
      });
    });
  }

  document.querySelectorAll("form[data-demo-form]").forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      if (toast) {
        toast.textContent = form.dataset.success || "Saved successfully.";
        toast.classList.add("show");
        setTimeout(() => toast.classList.remove("show"), 2200);
      }
      const next = form.dataset.redirect;
      if (next) setTimeout(() => { window.location.href = next; }, 700);
    });
  });

  document.querySelectorAll("[data-delete]").forEach((btn) => {
    btn.addEventListener("click", () => {
      if (confirm("Delete this record? This demo action is not permanent.")) {
        btn.closest("tr")?.remove();
        if (toast) {
          toast.textContent = "Record removed from this view.";
          toast.classList.add("show");
          setTimeout(() => toast.classList.remove("show"), 1800);
        }
      }
    });
  });
})();



document.querySelectorAll(".nav-toggle").forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.classList.toggle("open");
    });
});


document.querySelector('.menu-btn').addEventListener('click', function () {
    const html = document.documentElement;

    html.setAttribute(
        'data-sidenav-size',
        html.getAttribute('data-sidenav-size') === 'md-sidebar'
            ? 'sm-sidebar'
            : 'md-sidebar'
    );
});
