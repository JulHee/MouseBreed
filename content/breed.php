<h1 class="page-header"><?php echo $loadedBreed['name']; ?></h1>
<div class="row">
    <div class="col-md-4">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="cage" class="col-sm-2 control-label">Käfig</label>

                <div id="cage" class="col-sm-10">
                    <select class="form-control">
                        <option>Käfig 1</option>
                        <option>Käfig 2</option>
                        <option>Käfig 3</option>
                        <option>Käfig 4</option>
                        <option>Käfig 5</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <button type="button" id="sidebarNextDay"
                class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                      aria-hidden="true"></span> Nächter Tag
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Mausung</div>
            <div id="ListMouse" class="list-group">
                <a href="#" class="list-group-item active">Maus 1</a>
                <a href="#" class="list-group-item">Maus 2</a>
                <a href="#" class="list-group-item">Maus 3</a>
                <a href="#" class="list-group-item">Maus 4</a>
                <a href="#" class="list-group-item">Maus 5</a>
                <a href="#" class="list-group-item">Maus 6</a>
                <a href="#" class="list-group-item">Maus 7</a>
                <a href="#" class="list-group-item">Maus 8</a>
                <a href="#" class="list-group-item">Maus 9</a>
                <a href="#" class="list-group-item">Maus 10</a>
                <a href="#" class="list-group-item">Maus 11</a>
                <a href="#" class="list-group-item">Maus 12</a>
                <a href="#" class="list-group-item">Maus 13</a>
                <a href="#" class="list-group-item">Maus 14</a>
                <a href="#" class="list-group-item">Maus 15</a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Steckbrief</div>
            <div id="MouseInfo" class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Name</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoName" class="form-control-static">Klaus</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Gewicht</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoWeight" class="form-control-static">400g</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Geschlecht</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoGender" class="form-control-static">Männlich</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alter</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoAge" class="form-control-static">10 Tage</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Eltern</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoParents" class="form-control-static">Franz & Maria</p>
                                </div>
                            </div>
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                        data-target="#chooseGender">
                                    Geschlecht bestimmen
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="chooseGender" tabindex="-1" role="dialog"
                                 aria-labelledby="chooseGender"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Geschlecht bestimmen</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="mouseinfoGenderPic" src="/data/img/bildkarten/Maennchen_2846.png"
                                                 class="img-rounded img-responsive center-block">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary pull-left">Männlich</button>
                                            <button type="button" class="btn btn-primary">Weiblich</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img id="mouseinfoProfileImg" src="/data/img/Femalemouse.png" class="img-responsive img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="mid_content" class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Main</div>
            <div class="panel-body">
                <h3>Hier ist Workspace:</h3>

                <h3>Mäuseartige</h3>
                Die Mäuseartigen (Muroidea) sind eine zu den Mäuseverwandten gehörende Gruppe der Nagetiere. Mit
                rund
                1500 Arten umfassen sie mehr als ein Viertel der beschriebenen Säugetierarten.

                Von den nahe verwandten Springmäusen unterscheiden sie sich durch den myomorphen Kauapparat mit
                Jochbogenplatte und einem meist schlüssellochförmigen Unteraugenloch zum Durchtritt von
                Massetermuskel,
                Nerven und Blutgefäßen, das verkleinerte Jochbein sowie den häufig nach außen gebogenen, nie
                durchbrochenen Winkelfortsatz des Unterkiefers
                <h3>Körpermerkmale</h3>

                Mäuseartige sind eher kleine Nagetiere.[2] Im Körperbau und in der Körperfunktion unterscheiden sie
                sich
                jedoch beträchtlich voneinander. Die Länge einschließlich Schwanz reicht von weniger als 100
                Millimetern
                bei den Amerikanischen Zwergmäusen bis zu 800 Millimetern und mehr bei den Riesenborkenratten und
                den
                Riesenhamsterratten.[3] Letztere können ein Körpergewicht von 1,5 Kilogramm und die Bisamratte eins
                von
                1,8 Kilogramm erreichen. Der Schwanz ist meist dünn behaart und weist Hornschuppen auf.[4] Ebenso
                wie
                Ohren, Augen und Fell ist er jedoch in seinem Erscheinungsbild sehr variabel. Bei einigen Arten
                treten
                Polymorphismus oder ein die Körpergröße betreffender Sexualdimorphismus auf.[5] Neben den
                unterschiedlichen Anpassungen an Extrembedingungen kommt es bei Mäuseartigen häufig zu
                Parallelentwicklungen im Körperbau.[6]

                In den folgenden Abschnitten werden zunächst die bekannte oder angenommene ursprüngliche Ausprägung
                eines Merkmals sowie gegebenenfalls sekundär erworbene Ausprägungen einzelner Gruppen aufgeführt.
                <h3>Schädel</h3>
                Schädel der Maclear-Ratte Oberschädel: as) Flügel des hinteren Keilbeins, bo) Basioccipitale, bs)
                hinteres Keilbein, bt) Paukenblase, cl) Lambdaleiste, cnl) Capsula nasolacrimalis, co) Gelenkhöcker
                des
                Hinterhauptbeins, ct) Temporalleiste, f) Stirnbein, fhg) Foramen hypoglossi, fi) Schneidezahnloch,
                flm)
                Foramen lacerum medium, fm) großes Hinterhauptloch, fmp) Fossa mesopterygoidea, fo) Foramen ovale,
                foa)
                Foramen ovale accessorium, fpl) Gaumenloch, fpt) Flügelgrube des Keilbeins, ip)
                Zwischenscheitelbein, j)
                Jochbein, l) Tränenbein, m) Oberkiefer, ms) Warzenteil, n) Nasenbein, o) Hinterhauptbein, os) Flügel
                des
                vorderen Keilbeins, p) Scheitelbein, ph) Hakenfortsatz des Flügelbeins, pl) Gaumenbein, pm)
                Zwischenkieferbein, ppo) Processus paroccipitalis, pt) Flügelbein, pzm) Jochfortsatz des
                Oberkiefers,
                pzs) Jochfortsatz des Schuppenteils, s) Schuppenteil, spv) Keilbein-Gaumen-Loch, zn) Jochbogenkerbe,
                zp)
                Jochbogenplatte, zs) Jochbogendorn Unterkiefer: cm) Unterkieferkörper, pal) Zahnfachfortsatz, pan)
                Winkelfortsatz, pcn) Gelenkfortsatz, pcr) Muskelfortsatz

                Der Schädel der Mäuseartigen ist vom myomorphen Typ. Der vordere Ansatz des Jochbogens ist als
                auffällige, breite Jochbogenplatte ausgebildet und dient als Ursprungsfläche des seitlichen
                Massetermuskels. Die Platte ist bei den meisten Mäuseartigen steil nach oben geneigt, weist bei
                einigen
                jedoch seitlich nach unten. Sie dehnt sich nicht nach vorne aus oder bildet einen ausgeprägten
                Jochbogendorn und eine Jochbogenkerbe aus. Das Unteraugenloch befindet sich hauptsächlich oberhalb
                der
                Jochbogenplatte und weist meist eine kennzeichnende Schlüssellochform auf. So ist der obere Teil als
                Durchtritt des mittleren Massetermuskels vergrößert. Der untere Teil für den Durchtritt der Nerven
                und
                Blutgefäße zur Schnauzenregion ist dagegen gewöhnlich schlitzartig verengt, kann jedoch fehlen. Die
                Schnauzenseite ist mittwärts der Jochbogenplatte ursprünglich verknöchert, bei den meisten
                Mäuseartigen
                jedoch gefenstert. Das Jochbein ist verkleinert, macht nur einen kleinen Bereich des Jochbogens aus
                und
                berührt nicht das ebenfalls verkleinerte Tränenbein.[7][5][2]

                Das Stirnbein ist verengt und ohne Postorbitalfortsatz. Ein Zwischenscheitelbein ist vorhanden und
                gewöhnlich auffällig, bei einigen Mäuseartigen jedoch sehr klein. Der Bereich zwischen den
                Augenhöhlen
                ist glatt und abgerundet oder verengt und mit scharfen Leisten. Der Hirnschädel ist glatt oder wird
                von
                einem Scheitelkamm oder Temporalleisten gekreuzt. Die Lambdaleiste ist bei einigen Mäuseartigen
                stark
                ausgeprägt, gewöhnlich jedoch unscheinbar. Das Schuppenteil ist ohne oder mit Postorbitalleiste.
                Über
                der knöchernen Innenohrkapsel ist es geschlossen oder weist ein Foramen squamosomastoideum und ein
                Foramen postglenoideum auf. Pauken- und Warzenteil sind winzig bis stark aufgebläht. Bei einigen
                Mäuseartigen ist die Paukenblase in Kammern unterteilt, die gewöhnlich unverbaut sind, jedoch mit
                fächer- oder schwammartigem Knochen gefüllt sein können. Zusätzlich zum Trommelfell kann ein
                Nebentrommelfell vorhanden sein. Der Hammer ist parallel oder lotrecht ausgebildet.[7]

                Der knöcherne Gaumen ist breit und glatt oder schmal mit Leisten, Furchen und Dornen. Die
                Schneidezahnlöcher sind kurz und liegen hauptsächlich im Zwischenkieferbein oder sie sind
                verhältnismäßig lang und überspannen Zwischenkieferbein und Oberkiefer. Die hinteren Gaumenlöcher
                bestehen bei den meisten Mäuseartigen aus einem einzigen Löcherpaar. Bei anderen sind es mehrere
                Öffnungen oder längliche Schlitze. Posterolaterale Gaumengruben fehlen oder sind vorhanden. Die
                Wände
                der Fossa mesopterygoidea sind verknöchert oder von Keilbein-Gaumen-Löchern durchbrochen. Die
                Flügelgruben des Keilbeins sind flach und tellerartig bis stark vertieft und gestaucht. Ihre Wände
                sind
                verknöchert oder löchrig. Ein Foramen stapediale ist ausgebildet oder fehlt. Manchmal wird es als
                knöcherne Röhre durch den Steigbügel fortgeführt. Das Foramen sphenofrontale und die damit
                verbundene
                Squamoso-Alisphenoid-Furche sind vorhanden oder fehlen. Der Canalis alisphenoidalis ist vorhanden
                aber
                kurz. Foramen masticatorium und Foramen buccinatorium sind eigenständig oder sekundär miteinander
                verschmolzen. In letzterem Fall sind sie vom Foramen ovale accessorium durch eine Strebe des
                hinteren
                Keilbeinflügels getrennt oder mit diesem vereinigt, wenn die Strebe fehlt. Das Foramen ovale ist
                eigenständig oder mit dem Foramen lacerum medium verbunden. Der Hakenfortsatz des Flügelbeins ist
                freihängend oder mit der Paukenblase verwachsen.[7]

                Der Unterkiefer der Mäuseartigen ist vom sciurognathen Typ. Der Winkelfortsatz ist gerade oder nach
                außen gebogen und nie durchbrochen. Die Ansatzstelle des mittleren und seitlichen Massetermuskels
                ist
                mit den zusammenlaufenden oberen und unteren Masseterleisten verbunden. Das Zahnfach des unteren
                Schneidezahns kann an dessen Ende einen kapselförmig vorstehenden Zahnfachfortsatz ausbilden. Der
                Muskelfortsatz ist gewöhnlich ausgeprägt und hoch, kann jedoch verkleinert sein oder fehlen.
            </div>
        </div>
    </div>
    <!--<<div id="zuchtziel" class="tile">Zuchtziel
        </div>

    <div id="bottom" class="tile new">
        <button id="bnt1" class="testButton" type="button">Click Me!</button>
        <button id="bnt2" class="testButton" type="button">Click Me!</button>
        <button id="bnt3" class="testButton" type="button">Click Me!</button>
        <button id="bnt4" class="testButton" type="button">Click Me!</button>
    </div>-->
