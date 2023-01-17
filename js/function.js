function copyURL() {
    let urlText = document.getElementById("url");
    urlText.select();
    navigator.clipboard.writeText(urlText.value);
}