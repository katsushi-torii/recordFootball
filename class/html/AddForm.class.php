<?php
    class AddForm {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Add Form</title>
                <link rel="stylesheet" href="../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function title(){
            $htmlTitle = '
            <main class="add">
                <article>
                    <h3>試合を追加</h3>
                </article>
            ';
            return $htmlTitle;
        }

        static function form(){
            $htmlForm = '
            <section>
                <form method="POST" class="addForm">
                    <aside>
                        <label for="matchDate">試合日：</label>
                        <input type="date" name="matchDate" id="matchDate" required>
                    </aside>
                    <aside>
                        <label for="star">評価(5点満点)：</label>
                        <input type="number" name="star" id="star" min="0" max="5" required>
                    </aside>
                    <aside>
                        <label for="competetion">大会：</label>
                        <input type="text" name="competition" id="competition" required>
                    </aside>
                    <aside>
                        <label for="competetion">節・回戦：</label>
                        <input type="text" name="leg" id="leg" required>
                    </aside>
                    <aside>
                        <label for="teamA">チーム１：</label>
                        <input type="text" name="teamA" id="teamA" required>
                    </aside>
                    <aside>
                        <label for="scoreA">チーム１の点数：</label>
                        <select name="scoreA" id="scoreA" required>                 
                            <option value="" disabled selected>選択してください</option>
                        </select>
                    </aside>
                    <aside>
                        <label for="scorerA">チーム１の得点者：</label>
                        <aside class="scorerA"></aside>
                    </aside>
                    <aside>
                        <label for="teamB">チーム２：</label>
                        <input type="text" name="teamB" id="teamB" required>
                    </aside>
                    <aside>
                        <label for="scoreB">チーム２の点数：</label>
                        <select name="scoreB" id="scoreB" required>
                            <option value="" disabled selected>選択してください</option>
                        </select>
                    </aside>
                    <aside>
                        <label for="scorerB">チーム２の得点者：</label>
                        <aside class="scorerB"></aside>
                    </aside>
                    <aside>
                        <label for="comment">自由記述：</label>
                        <textarea name="comment" id="comment"></textarea>
                    </aside>
                    <button type="submit">追加</button>
                </form>
            </section>
            ';
            return $htmlForm;
        }

        static function options(){
            $htmlOptions = '
                <aside>
                    <a href="home.php">一覧</a>
                </aside>
            </main>
            ';
            return $htmlOptions;
        }

        static function script(){
            $htmlScript = '
                    </main>
                </body>
                <script>
                    //点数を15までループ
                    for(let i = 0; i < 16; i++){
                        let newOption = $(`
                            <option value="${i}">${i}</option>
                        `);
                        $("#scoreA").append(newOption);
                        let newOptionB = $(`
                            <option value="${i}">${i}</option>
                        `);
                        $("#scoreB").append(newOptionB);
                    }
                    //点数が選ばれるたびにその数にあった得点者記入欄を表示
                    $("#scoreA").on("change", function(){
                        //得点者inputをリセット
                        $(".scorerA input").remove();
                        for(let i = 0; i < $("#scoreA").val(); i++){
                            let newInput = $(`     
                                <input type="text" name="scorerA${i}" id="scorerA${i}" required>
                            `);
                            $(".scorerA").append(newInput);
                        }
                    })
                    //チームBも同様
                    $("#scoreB").on("change", function(){
                        $(".scorerB input").remove();
                        for(let i = 0; i < $("#scoreB").val(); i++){
                            let newInput = $(`     
                                <input type="text" name="scorerB${i}" id="scorerB${i}" required>
                            `);
                            $(".scorerB").append(newInput);
                        }
                    })
                </script>
            </html>
            ';
            return $htmlScript;
        }
    }