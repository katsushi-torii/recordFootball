<?php
    class MatchData {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="../css/style.css">
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function matchData($match){
            $htmlMatchData = '
            <main class="match">
                <section>
                    <article>
                        <h4>'.$match->matchDate.'</h4>
                        <h4 class="star">'.$match->star.'/5</h4>
                    </article>
                    <article>
                        <h4>'.$match->competition.'</h4>
                        <h4>'.$match->leg.'</h4>
                    </article>
                    <article>
                        <h4>'.$match->teamA.'</h4>
                        <h4>'.$match->scoreA.'</h4>
                        <strong>-</strong>
                        <h4>'.$match->scoreB.'</h4>
                        <h4>'.$match->teamB.'</h4>
                    </article>
                    <aside>
                        <h4>'.$match->teamA.'の得点者：'.$match->scorerA.'</h4>
                        <h4>'.$match->teamB.'の得点者：'.$match->scorerB.'</h4>
                    </aside>
                    <p>
                    '.$match->comment.'
                    </p>
                </section>
            ';
            return $htmlMatchData;
        }

        static function aTags($match){
            $htmlATags = '
                <aside>
                    <a href="home.php">一覧</a>
                    <a href="editForm.php?id='.$match->id.'">編集</a>
                    <a href="delete">削除</a>
                </aside>
            </main>
            </body>
            </html>
            ';
            return $htmlATags;
        }
    }