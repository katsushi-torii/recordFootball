<?php
    class Home {
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

        static function filterHead(){
            $htmlFilterHead = '
            <main class="home">
                <section class="filter">
                    <article>
                        <button>✖</button>
                        <form action="GET">
                            <aside>
                                <label for="date">日付：</label>
                                <input type="date" name="date" id="date">
                            </aside>
                            <aside>
                                <label for="star">評価：</label>
                                <select name="star" id="star">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </aside>
            ';
            return $htmlFilterHead;
        }

        static function filterCompetition(){
            $htmlCompetition = '
            <aside>
                <label for="competetion">大会形式：</label>
                <select name="competetion" id="competetion">
                    <option value="premier">Premier League</option>
                    <option value="laLiga">La Liga</option>
                </select>
            </aside>
            ';
            return $htmlCompetition;
        }

        static function filterTeam(){
            $htmlTeam = '
            <aside>
                <label for="team">チーム：</label>
                <select name="team" id="team">
                    <option value="arsenal">Arsenal</option>
                    <option value="liverpool">Liverpool</option>
                </select>
            </aside>
            ';
            return $htmlTeam;
        }

        static function filterEnd(){
            $htmlFilterEnd = '
                        <input type="submit" value="検索">
                    </form>
                </article>
            </section>
            ';
            return $htmlFilterEnd;
        }

        static function order(){
            $htmlOrder = '
            <article>
                <ul class="order">
                    <li><a href="?sortBy=desc">日付↓</a></li>
                    <li><a href="./">日付↑</a></li>
                    <li><a href="?sortBy=starDesc">評価↓</a></li>
                    <li><a href="?sortBy=star">評価↑</a></li>
                </ul>
            ';
            return $htmlOrder;
        }

        static function matchList(array $matchList){
            $htmlList = '<ul class="list">';
            foreach($matchList as $match){
                $htmlList .= self::matchRow($match);
            }
            $htmlList .= '</ul>';
            return $htmlList;
        }

        static function matchRow($match){
            $htmlRow = '
            <li>
                <article>
                    <aside>
                        <strong>'.$match->competition.'</strong>
                        <strong>'.$match->leg.'</strong>
                        <strong>'.$match->matchDate.'</strong>
                    </aside>
                    <aside>
                        <strong>'.$match->teamA.'</strong>
                        <strong>'.$match->scoreA.' - '.$match->scoreB.'</strong>
                        <strong>'.$match->teamB.'</strong>
                    </aside>
                </article>
                <section>
                    <h4><strong class="star">'.$match->star.'</strong>/5</h4>
                    <aside>
                        <a href="match.php?id='.$match->id.'">詳細</a>
                        <a href="delete" class="delete">削除</a>
                    </aside>
                </section>
            </li>
            ';
            return $htmlRow;
        }

        static function pageEnd(){
            $htmlEnd = '
                    </article>
                </main>
            </body>
            </html>
            ';
            return $htmlEnd;
        }
    }