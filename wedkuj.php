<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>

<body>

    <div id="header">
        <h1>Portal dla wedkarzy</h1>
    </div>

    <div id="left">
        <div id="left1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $db = mysqli_connect("localhost","root","","karp");
                    $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby, lowisko WHERE lowisko.Ryby_id = ryby.id AND lowisko.rodzaj = 3;";
                    $r = mysqli_query($db, $sql);
                    while($w = mysqli_fetch_row($r)){
                        echo "<li>".$w[0]." pływa w rzece ".$w[1].", ".$w[2]."</li>";
                    }

                ?>
            </ol>
        </div>

        <div id="left2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th><th>Gatunek</th><th>Występowanie</th>
                </tr>
                <?php
                    $sql = "SELECT id, nazwa, wystepowanie FROM ryby where ryby.styl_zycia = 1;";
                    $r = mysqli_query($db, $sql);
                    $i = 1;
                    while($w = mysqli_fetch_row($r)){
                        echo "<tr><td>".$i."</td><td>".$w[1]."</td><td>".$w[2]."</td></tr>";
                        $i++;
                    }
                    mysqli_close($db);
                ?>
            </table>
        </div>       
    </div>

    <div id="right">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>

    <footer id="footer">
        <p>Stronę wykonał: 08</p>
    </footer>

</body>
</html>