    </main>
    <footer class="page-footer blue darken-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Used libraries:</h5>
                    <ul>
                        <li>Materialize.css</li>
                        <li>Highlight.js</li>
                        <li>Material Icons</li>
                    </ul>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Powered by:</h5>
                    <ul>
                        <li>Mysql 5.1</li>
                        <li>PHP 7.2</li>
                        <li>MongoDB 4.0.6</li>
                        <li>Nginx 1.15.8</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright blue darken-4">
            <div class="container">
                © 2019 Czékus Máté under Beerware License.
            </div>
        </div>
    </footer>
    <script src="js/materialize.min.js"></script>
    <script src="js/highlight.pack.js"></script>
    <script>
        function copyToClipboard(unit) {
            var copyText = document.getElementById(unit).textContent;
            const textArea = document.createElement('textarea');
            textArea.textContent = copyText;
            document.body.append(textArea);
            textArea.select();
            document.execCommand("copy");
            textArea.parentNode.removeChild(textArea);
        }
        hljs.initHighlightingOnLoad();
        var test = hljs.listLanguages();
        test.forEach(element => {
            let select = document.getElementById('language');
            let opt = document.createElement('option');
            opt.value = element;
            opt.innerHTML = element;
            select.appendChild(opt);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
        });
    </script>
</body>
</html>