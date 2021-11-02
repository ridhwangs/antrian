<html xmlns="//www.w3.org/1999/xhtml">
    <head>
        <title>Print</title>
    </head>
    <body>
        <div>
            <p>On android devices (I have tested Nexus 5, Nexus 10, Galaxy S4 and Galaxy Tab 3) the window.print() command in javascript doesn't do anything, as far as I can tell it doesn't even register an error.</p>
            <p>I know for a fact that most if not all of these browsers can print because you can use mobile chromes menu to choose "print".  My questions is, why doesn't window.print() trigger the behavior you would expect (opening the clients print menu).
            And is there an android alternative to window.print()?</p>
        </div>

        <div id="gcpPrint"></div>

        <script src="//www.google.com/cloudprint/client/cpgadget.js">
        </script>

        <script>
            var gadget = new cloudprint.Gadget();
            gadget.setPrintButton(cloudprint.Gadget.createDefaultPrintButton("gcpPrint"));
            gadget.setPrintDocument("text/html", "Print", document.documentElement.innerHTML);
        </script>
    </body>
</html>