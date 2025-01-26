<style>
    @import "../../public/assets/css/reset.css";

.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: var(--black-bg);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
    position: relative;
}

.nav__logo {
    color: var(--primary-gold);
    text-decoration: none;
    font-family: 'Georgia', serif;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 15px;
}

.nav__logo:hover {
    color: var(--primary-red);
    text-decoration: underline;
}

.nav__links {
    display: flex;
    gap: 15px;
}

.nav__link {
    color: var(--white);
    text-decoration: none;
    padding: 8px 12px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: bold;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.nav__link:hover {
    color: var(--primary-gold);
    background-color: var(--primary-red);
    border-radius: 5px;
}

.nav__menu-icon {
    display: none;
    flex-direction: column;
    gap: 4px;
    cursor: pointer;
}

.nav__menu-icon div {
    width: 25px;
    height: 3px;
    background-color: var(--white);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .nav__links {
        display: none;
        flex-direction: column;
        gap: 10px;
        background-color: var(--black-bg);
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
    }

    .nav__links.active {
        display: flex;
    }

    .nav__menu-icon {
        display: flex;
    }

    .nav__menu-icon.active div:nth-child(1) {
        transform: rotate(45deg);
        transform-origin: 5px 5px;
    }

    .nav__menu-icon.active div:nth-child(2) {
        opacity: 0;
    }

    .nav__menu-icon.active div:nth-child(3) {
        transform: rotate(-45deg);
        transform-origin: 5px 5px;
    }
}

</style>

<nav class="nav">
    <a href="index.php" class="nav__logo">&#x2728; Panorama &#x2728;</a>
    
    <div class="nav__menu-icon" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="nav__links">
        <a href="/members.php" class="nav__link">Members</a>
        <a href="/sessions.php" class="nav__link">Sessions</a>
    </div>
</nav>

<script>
    function toggleMenu() {
        const links = document.querySelector('.nav__links');
        const menuIcon = document.querySelector('.nav__menu-icon');
        
        links.classList.toggle('active');
        menuIcon.classList.toggle('active');
    }
</script>
