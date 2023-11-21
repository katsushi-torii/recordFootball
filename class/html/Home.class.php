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
                <title>Home</title>
                <link rel="stylesheet" href="../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function fixedButtons(){
            $htmlfixedButtons = '
            <main class="home">
                <aside>
                    <button class="search">検索</button>
                    <button>追加</button>
                    <a href="#" class="toTop">↑</a>
                </aside>
            ';
            return $htmlfixedButtons;
        }

        static function filterHead(){
            $htmlFilterHead = '
            <section class="filter">
                <article>
                    <button class="close">✖</button>
                    <form method="GET">
                        <aside>
                            <label for="star">評価：</label>
                            <select name="star" id="star">
                                <option selected disabled>下記から選択</option>
                                <option value="9">0</option>
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

        static function filterCompetition($competitionArray){
            $htmlCompetition = '
            <aside>
                <label for="competition">大会形式：</label>
                <select name="competition" id="competition">
                    <option selected disabled>下記から選択</option>';
            foreach($competitionArray as $competition){
                $htmlCompetition .= '  
                <option value="'.$competition.'">'.$competition.'</option>
                ';
            };
            $htmlCompetition .= '    
                </select>
            </aside>
            ';
            return $htmlCompetition;
        }

        static function filterTeam($teams){
            $htmlTeam = '
            <aside>
                <label for="team">チーム：</label>
                <select name="team" id="team">
                    <option selected disabled>下記から選択</option>';
            foreach($teams as $team){
                $htmlTeam .= ' 
                <option value="'.$team.'">'.$team.'</option>
                ';
            }
            $htmlTeam .= '
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

        static function order($parameter){
            $htmlOrder = '
            <article>
                <ul class="order">
                    <li><a href="?'.$parameter.'&sortBy=desc">日付↓</a></li>
                    <li><a href="?'.$parameter.'">日付↑</a></li>
                    <li><a href="?'.$parameter.'&sortBy=starDesc">評価↓</a></li>
                    <li><a href="?'.$parameter.'&sortBy=star">評価↑</a></li>
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
                    <a href="match.php?id='.$match->id.'">詳細</a>
                </section>
            </li>
            ';
            return $htmlRow;
        }

        static function script(){
            $htmlScript = '
                    </article>
                </main>
            </body>          
            <script>
            $(".search").click(()=>{
                $(".filter").show();
            })
            $(".close").click(()=>{
                $(".filter").hide();
            })
            </script>
            </html>
            ';
            return $htmlScript;
        }
    }