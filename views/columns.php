<html>
    <head>
        <title>&ldquo;Columns&rdquo; Database Discovery Tool</title>
        <style type="text/css">
            *{
                font-family: "Segoe UI", sans-serif;
                color: #666;
            }
            hgroup, h2, h3{
                background: #93e078;
                padding: 10px;
            }
            h1{
                margin: 0;
            }
            h2{
                padding: 4px;
                font-size: 80%;
            }
            hgroup a{
                float: right;
                padding: 10px;
            }
            hgroup p{
                color: #fff;
                font-size: 80%;
            }
            aside{
                float: right;
                padding: 0 0 20px 20px;
                background: #fff;
            }
            a{
                text-decoration: none;
            }
            a:hover{
                text-decoration: underline;
            }
            footer{
                clear: both;
            }
            pre{
                padding-left: 20px;
                color: #f60;
                font: 90% Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
            }
        </style>

    </head>
    <body>
        <hgroup>
            <a href="#-usage-">Usage</a>
            <h1>&ldquo;Columns&rdquo; Database Discovery Tool</h1>
            <p>
                You know that specifying your column details manually in your Model files will make your object-relational
                mapping framework operate faster than expecting it to auto-discover the database on every page hit, but
                typing out all those columns names to help it? That's going to take a while and it's error prone, and what
                about when you modify your schema? <b>Why not be lazy <em>and</em> accurate!?</b>
            </p>
        </hgroup>
        <aside>
            <h3>Tables</h3>
            <table>
                <?php
                    foreach($tables as $table)
                    {
                        echo "<tr><td><a href='#$table'>$table</a></td></tr>";
                    }
                ?>
            </table>
        </aside>

        <section>
            <?php
            foreach($tables as $table)
            {
                echo "<h2><a name='$table'>$table</a></h2>";
                echo '<article><pre>'.$details[$table].'</pre></article>';
            }
            ?>
        </section>

        <footer>
            <h3><a name="-usage-">Usage</a></h3>
            <p>
                /columns/<b>system</b>/<b>database</b>/<b>table</b>
                <ul>
                    <li><b>system</b>: the modelling framework you are using 'orm', 'automodeler', etc. (ORM is default)</li>
                    <li><b>database</b>: from your database config file, which group would you like to discover? ('default' is default)</li>
                    <li><b>table</b>: if you don't name the table all table from the database will be shown by default</li>
                </ul>
            </p>
            <p>
                Only works if you are in Kohana::DEVELOPMENT mode!
            </p>
            <p>
                If you're happy with the output copy/paste it into your PHP source file. Enjoy being lazy!
            </p>

            <small>&copy; <?php echo Date('Y') ?> Paul Schwarz</small>
        </footer>
    </body>
</html>