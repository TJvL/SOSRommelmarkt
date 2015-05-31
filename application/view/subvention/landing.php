<div class="container">
    <div class="white">
        <div class="content">
            <div class="idealsteps-container">
                <nav class="idealsteps-nav"></nav>

                <form class="idealforms" id="subventionForm" method="POST" action="javascript:void(0)" role="form">
                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">


                            <div class="field">
                                <label class="main">Voornaam</label>
                                <input name="name" type="text" placeholder="Uw voornaam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Achternaam</label>
                                <input name="lastname" type="text" placeholder="Uw achternaam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Bedrijfsnaam</label>
                                <input name="firm" type="text" placeholder="De naam van uw bedrijf">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">KVK nummer</label>
                                <input name="kvk" type="text" placeholder="Uw KVK-nummer">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Straatnaam</label>
                                <input name="address" type="text" placeholder="Uw straatnaam met huisnummer">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Postcode</label>
                                <input name="postalcode" type="text" placeholder="0000AA">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Plaats</label>
                                <input name="city" type="text" placeholder="Uw woonplaats">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- step 3 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Telefoon</label>
                                <input name="phonenumber1" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Mobiel</label>
                                <input name="phonenumber2" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Fax</label>
                                <input name="fax" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">E-Mail</label>
                                <input name="email" type="email" placeholder="iemand@email.com">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- Step 4 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Toelichting</label>
                                <textarea name="elucidation" cols="30" rows="7" placeholder="Graag invullen waarom u een subsidie nodig heeft."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Geplande activiteiten</label>
                                <textarea name="activities" cols="30" rows="7" placeholder="Geef een beschrijving van beoogde activiteiten."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Beoogde resultaten</label>
                                <textarea name="results" cols="30" rows="7" placeholder="Geef een beschrijving van de beoogde resultaten."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>

                        </section>
                        
                        <!-- Step 5 -->

                        <section class="idealsteps-step">
                        
                        	<p>Voeg hier bestanden toe die de subsidieaanvraag kunnen verduidelijken.</p>
                        	
                        	<div class="field">
								<label class="main">Bestand</label>
								<input name="files[]" id="files[]" type="file">
								<span class="error"></span>
							</div>
							
							<div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button id="addFileFieldButton" name="addFileFieldButton" type="button">Bestandsveld toevoegen</button>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="submit" class="submit">Versturen</button>
                            </div>

                        </section>

                    </div>
                    <span id="invalid"></span>
                </form>
            </div>
        </div>
    </div>
</div>
