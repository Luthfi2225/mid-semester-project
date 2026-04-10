import './bootstrap';

const applyTheme = () => {
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

applyTheme();

document.addEventListener('livewire:navigated', () => {
    applyTheme();
    initDarkModeToggle();
});

function initDarkModeToggle() {
    const checkbox = document.querySelector('#dark-mode-checkbox');
    const sunIcon = document.querySelector('#sun-icon');
    const moonIcon = document.querySelector('#moon-icon');
    const html = document.documentElement;

    if (!checkbox) return;

    const updateUI = (isDark) => {
        const dot = document.querySelector('.dot');

        checkbox.checked = isDark;

        if (isDark) {
            sunIcon?.classList.add('hidden');
            moonIcon?.classList.remove('hidden');
            // Paksa geser jika peer-checked macet
            dot?.classList.add('translate-x-6');
            dot?.classList.remove('translate-x-0');
        } else {
            sunIcon?.classList.remove('hidden');
            moonIcon?.classList.add('hidden');
            // Paksa balik ke posisi awal
            dot?.classList.add('translate-x-0');
            dot?.classList.remove('translate-x-6');
        }
    };

    updateUI(html.classList.contains('dark'));

    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            updateUI(true);
        } else {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            updateUI(false);
        }
    });
}

document.addEventListener('livewire:navigated', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const sidebarTextTitle = document.querySelectorAll('.sidebarTextTitle');
    const sidebarText = document.querySelectorAll('.sidebarText');
    const sidebarFooter = document.getElementById('sidebarFooter');
    const profileButton = document.getElementById('profileButton');
    const settingButton = document.getElementById('settingButton');

    const updateSidebarUI = (shouldClose) => {
        if (shouldClose) {
            sidebar.classList.replace('w-64', 'w-16');
            sidebarTitle.classList.add('opacity-0');
            sidebarTextTitle.forEach(el => el.classList.add('opacity-0'));
            sidebarText.forEach(el => el.classList.add('w-0', 'opacity-0'));
            setTimeout(() => {
                sidebarTitle.classList.add('invisible');
                sidebarTextTitle.forEach(el => el.classList.add('invisible'));
                sidebarText.forEach(el => el.classList.add('invisible'));
            }, 400);
            sidebarFooter.classList.replace('w-59.5', 'w-12');
            sidebarFooter.classList.replace('bottom-10', 'bottom-35');
            profileButton.classList.replace('top-2', 'top-14.5');
            profileButton.classList.replace('left-24.5', 'left-0.75');
            settingButton.classList.replace('top-2', 'top-27');
            settingButton.classList.replace('left-48.25', 'left-0.75');
        } else {
            sidebar.classList.replace('w-16', 'w-64');
            sidebarTitle.classList.remove('opacity-0', 'invisible');
            sidebarTextTitle.forEach(el => el.classList.remove('opacity-0', 'invisible'));
            sidebarText.forEach(el => el.classList.remove('w-0', 'opacity-0', 'invisible'));
            sidebarFooter.classList.replace('w-12', 'w-59.5');
            sidebarFooter.classList.replace('bottom-35', 'bottom-10');
            profileButton.classList.replace('top-14.5', 'top-2');
            profileButton.classList.replace('left-0.75', 'left-24.5');
            settingButton.classList.replace('top-27', 'top-2');
            settingButton.classList.replace('left-0.75', 'left-48.25');
        }
    };

    if (sidebar) {
        const isClosed = localStorage.getItem('sidebarClosed') === 'true';
        if (isClosed) {
            updateSidebarUI(true);
        }
    }

    if (toggleSidebar && sidebar) {
        toggleSidebar.addEventListener('click', () => {
            const willClose = sidebar.classList.contains('w-64');
            updateSidebarUI(willClose);
            localStorage.setItem('sidebarClosed', willClose);
        });
    }
});

window.confirmBackCategories = function(targetUrl) {
    const nameInput = document.getElementById('name');
    const parentSelect = document.querySelector('select[name="parent_id"]');

    const currentName = nameInput ? nameInput.value.trim() : "";

    const originalName = nameInput ? nameInput.defaultValue.trim() : "";

    let isChanged = false;

    if (currentName !== originalName) {
        isChanged = true;
    }

    if (parentSelect) {
        const currentParent = parentSelect.value;
        const originalParent = Array.from(parentSelect.options).find(opt => opt.defaultSelected)?.value || "";

        if (currentParent !== originalParent) {
            isChanged = true;
        }
    }

    if (isChanged) {
        if (confirm("Perubahan tidak akan tersimpan, apakah anda yakin?")) {
            window.location.href = targetUrl;
        }
    } else {
        window.location.href = targetUrl;
    }
}

window.validatePublish = function(newsId, title, author, content) {
    let errors = [];

    if (!title || title.trim() === "") {
        errors.push("- Judul Berita tidak boleh kosong");
    }

    if (!author || author.trim() === "") {
        errors.push("- Penulis tidak boleh kosong");
    }

    const plainContent = content ? content.replace(/<[^>]*>/g, '').trim() : "";
    if (plainContent === "") {
        errors.push("- Isi Berita tidak boleh kosong");
    }

    if (errors.length > 0) {
        alert("Gagal Publikasi:\n" + errors.join("\n"));
        return;
    }

    const confirmation = confirm("Mohon diperhatikan apakah ada kesalahan penulisan atau tidak sebelum mempublikasi berita!");

    if (confirmation) {
        document.getElementById(`publish-form-${newsId}`).submit();
    }
}

window.registerPageOn = function() {
    const loginPage = document.getElementById('loginPage');
    const registerPage = document.getElementById('registerPage');

    loginPage.classList.add('invisible');
    registerPage.classList.remove('invisible');
}

window.loginPageOn = function() {
    const loginPage = document.getElementById('loginPage');
    const registerPage = document.getElementById('registerPage');

    loginPage.classList.remove('invisible');
    registerPage.classList.add('invisible');
}
