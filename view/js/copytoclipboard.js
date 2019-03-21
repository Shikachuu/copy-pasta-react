function copyToClipboard(unit) {
    var copyText = document.getElementById(unit).textContent;
    const textArea = document.createElement('textarea');
    textArea.textContent = copyText;
    document.body.append(textArea);
    textArea.select();
    document.execCommand("copy");
    textArea.parentNode.removeChild(textArea);
}