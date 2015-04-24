<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->

<head>
    <link href=  "/SOSRommelmarkt/IdealForms/css/jquery.idealforms.css" rel="stylesheet">
</head>

<div class="container">
    <div class="white">
        <div class="content">

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="" novalidate autocomplete="off" class="idealforms">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Username:</label>
                                <input name="username" type="text" data-idealforms-ajax="ajax.php">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">E-Mail:</label>
                                <input name="email" type="email">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Password:</label>
                                <input name="password" type="password">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Confirm:</label>
                                <input name="confirmpass" type="password">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Date:</label>
                                <input name="date" type="text" placeholder="mm/dd/yyyy" class="datepicker">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Picture:</label>
                                <input id="picture" name="picture" type="file" multiple>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Website:</label>
                                <input name="website" type="text">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="next">Next &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Sex:</label>
                                <p class="group">
                                    <label><input name="sex" type="radio" value="male">Male</label>
                                    <label><input name="sex" type="radio" value="female">Female</label>
                                </p>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Hobbies:</label>
                                <p class="group">
                                    <label><input name="hobbies[]" type="checkbox" value="football">Football</label>
                                    <label><input name="hobbies[]" type="checkbox" value="basketball">Basketball</label>
                                    <label><input name="hobbies[]" type="checkbox" value="dancing">Dancing</label>
                                    <label><input name="hobbies[]" type="checkbox" value="dancing">Parkour</label>
                                    <label><input name="hobbies[]" type="checkbox" value="dancing">Videogames</label>
                                </p>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Prev</button>
                                <button type="button" class="next">Next &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 3 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Phone:</label>
                                <input name="phone" type="text" placeholder="000-000-0000">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Zip:</label>
                                <input name="zip" type="text" placeholder="00000">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Options:</label>
                                <select name="options" id="">
                                    <option value="default">&ndash; Select an option &ndash;</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                </select>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Comments:</label>
                                <textarea name="comments" cols="30" rows="10"></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Prev</button>
                                <button type="submit" class="submit">Submit</button>
                            </div>

                        </section>

                    </div>

                    <span id="invalid"></span>

                </form>

            </div>

        </div>
    </div>


</div>

<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.submit.js" type="text/javascript"></script>
