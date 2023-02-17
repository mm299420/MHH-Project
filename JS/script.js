var SelectionTrue = false;
function Hide() {
    HideText = document.getElementById("CookieTxt")
    HideText.style.display = "none"
    ShowSelect = document.getElementById("CookieSelectForm")
    ShowSelect.style.display = "inline"
}
function Select() {
    HideText = document.getElementById("CookiesFenster")
    HideText.style.display = "none"

    if (SelectionTrue) {
        document.cookie = 'Tracking=true'
        document.cookie = 'Personalization=true'
        document.cookie = 'Functions=true'
    }
    CookieAllg.style.display = 'inline-block'
}
function SelectCB() {
    if (Tracking.checked) {
        document.cookie = 'Tracking=true'
    }
    if (Personalization.checked) {
        document.cookie = 'Personalization=true'
    }
    if (Functions.checked) {
        document.cookie = 'Functions=true'
    }
}
function Decline         () {
    window.location.assign("index.php");
}

function CookieTXTE() {
    BannerTXT = document.getElementById("CookieIMGBannerTXT")
    BannerIMG = document.getElementById("imgBsp")

    BannerTXT.style.display = "inline"
    BannerIMG.style.display = "none"
}
function CookieTXTL() {
    BannerTXT = document.getElementById("CookieIMGBannerTXT")
    BannerIMG = document.getElementById("imgBsp")

    BannerTXT.style.display = "none"
    BannerIMG.style.display = "inline"
}