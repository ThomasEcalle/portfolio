<?php



$histoire_bonus = array (

	"intro"  => array (
	
	"texte" =>" <p>Fatigué par la vie trépidante et les emphorisages( embouteillages) de Lutèce, tu as décidé, sur les conseil de ton père Océanix, de retourner pour quelque temps dans un petit village armoricain que tu connais bien.</p>
	<p>Lors de tes précédents séjours, tu t'es déjà initié au commerce avec Ordralfabetix ou à l'élevage avec Déboitementduménix, ou à la chasse avec Obelix. Tes virées nocturnes dans Lutèce t'ont permis d'acquérir la résistance à l'ivresse.</p>
	<p>Choisis l'une de ces quatres aptitudes secondaires (commerce, élevage, chasse, résistanxce à l'ivresse).</p>",
	"choix" => array ("commerce","elevage","chasse", "ivresse")
	
	)

);

$histoire = array (

	"0"=> array (
		"texte" => "<p>Le voyage depuis Lutèce s'est déroulé sans encombre. Tu as fière allure sur ton magnifique char rouge fabriqué à Mediolanum.</p>
		<p>Malgré le prix du fourrage, qui a beaucoup augmenté ces derniers temps, il te reste 35 sesterces dans la bourse qu'Océanix t'a confiée avant ton départ.</p>
		<p> Le garde posté devant la porte du village s'aplatit à temps dans le fossé : pour épater les villageois, tu pousses les chevaux au maximum...</p>
		<p> Mais au moment de franchir la porte du village, une roue de ton char se détache et... <strong>PATATRA !!</strong> Par Toutatis ! Il y a eu plus de peur que de mal, mais le char est plutôt endommagé.</p>
		<p>Attirés par le bruit, les villageois accourent sur la place, tandis que, tout penaud, tu te diriges vers la hutte de ton oncle Abraracourcix.</p>
		<p>Va en <strong>1</strong></p>",
		"choix" => array ("1"),
		"image" => "none"
	
	),
	"1"=> array (
		"texte" => "<p>Bonnemine t'acceuille à bras ouvert (tu as toujours été son neveu préféré).</p>
		<p><i>- Goudurix, mon brave petit, comment vas-tu? Tu dois être fourbu après un si long voyage ! Dommage que ton oncle ne soit pas ici en ce moment. As-tu mangé au moins ? J'ai justement un sanglier sur le feu. Mais, en attendant, je vais te remplir une bassine d'eau au puits du village pour que tu puisse prendre un bon bain.</i></p>
		<p>Impossible de t'éclipser pour l'instant. Tu embrasses ta tante puis : </p>
		<p>Tu n'as pas vraiment faim et tu préfères prendre un bain. Va en <strong>20</strong></p>
		<p>Tu ne peux résister à l'alléchante proposition de Bonnemine. Va en <strong>14</strong></p>",
		"choix" => array ("20","14"),
		"image" => "none"
	),
	"2"=> array (
		"texte" => "<p>Sur la place du village, chacun vaque à ses occupations habituelles. Tu peux aller (si tu ne t'y es pas déjà rendu):</p>
		<p><ul><li>Chez tes amis Astérix et Obélix, en <strong>26</strong></li><li>Chez Panoramix , le druide, en <strong>17</strong></li><li>Chez agecanonix, en <strong>21</strong></li><li>Retourner voir Bonnemine, en <strong>24</strong></li><li>Si tu sais où est parti Abraracourcix, tu peux partir à sa recherche en <strong>30</strong></li></ul></p>",
		"choix" => array ("26","17","21","24","30"),
		"image" => "none"
	),
	"3" => array (
		"texte" => "<p>Ah, rien de tel qu'une bonne bagarre pour s'assouplir les jointures.</p>
		<p>Paf ! Pof ! Les coups pleuvent de tous les côtés. Si tes amis du quartier Latin te voyaient !</p>
		<p>Des projectiles en tous genres passent et repassent</p>
		<p><i>Tu passes une épreuve de combativité de difficulté 4 !</i></p>",
		"choix" => array ("epreuve de combativite"),
		"epreuve" => array ( "difficulte" => "4","succes" => "27","echec" => "15"),
		"image" => "images/bagarre_village.png"
	),
	"4" => array (
		"texte" => "<p>Tiens, tiens. Un légionnaire romain ! Accroupis dans le fossé qui entoure le village, le romain observe attentivement tout ce qui se passe sur la place à travers une fente dans la palissade.</p>
		<p>Un espion ! Et en plus, en tenue de camouflage (quelques maigres rameaux sur le casque).</p>
		<p>Quand il t'aperçoit, il fait mine de s'enfuir. A toi de combattre ou d ele laisser s'en aller !</p>
		<p><ul><li>Tu le laisses partir et retourne au village, va en <strong>2</strong></li><li>Tu choisis le combat contre le romain qui a une combativité de 20</li></ul></p>",
		"choix" => array ("2","combat"),
		"epreuve" => array ( "difficulte" => "20","succes" => "16","echec" => "15"),
		"image" => "none"
	),
	"5" => array (
	"texte" => "<p><i>- Goudurix petit chenapan ! Ne te conduis pas comme un sauvage. Se battre dans la rue, à ton âge !</i></p>
	<p><i>Je croyais que les jeunes de Lutèce étaient mieux élevés que les barbares d'ici, mais je vois qu'il n'en est rien. J'en parlerai à Océanonix ! </i> menace Bonnemine</p>
	<p><ul><li>Execution, tu réintègres la bassine. Va en <strong>10</strong></li></ul></p>",
	"choix" => array ("10"),
	"image" => "none"
	),
	"6" => array (
	"texte" => "<p><i>- Gergovie, ah ! Gergovie, c'était le bon temps ! J'y étais, moi, à Gergovie. Quelle tripotée on leur a mise, aux romains ! </i></p>
	<p><i>Ca, c'était une grande bataille, Gergovie ! Et on n'avait pas de potion magique, nous, à Gergovie ! Je m'en souviens encore, avec Vercingetorix nous étions assiégés par les romains dans la cité fortifiée. Les armées de César campaient au nord de la ville et il nous était impossible de sortir par le sud, car la cité était construite au-dessus des falaises. Le sromains n'ont jamais réussi à pénétrer dans la ville.</i></p>
	<p><i>Et même, mon petit Goudurix, certains Gaulois ont creusé des souterrains qui débouchaient de l'autre côté des remparts pour attaquer les troupes de César pendant la nuit sans ouvrir les portes de la cité. Ah ! Gergovie,ça, c'était quelque chose ! C'est pas comme les guerres d'aujourd'hui, avec la potion magique et tout ça.</i></p>
	<p><i>Pauvre jeunesse ! </i></p>
	<p><i>Tiens, tu vois ce glaive, sur la cheminée, c'est avec lui que je me suis battu à Gergovie. Si tu veux je te le prête. Fais lui honneur, il était à Gergovie, et il a vu plus de romains que toi ! J'y retournerais bien, à gergovie, tu sais. J'y avais un ami, Porquépix. Il est resté là-bas et il a ouvert un petit commerce. J'aurai dû faire comme lui, tiens ! </i></p>
	<p><i>Aller, à un de ces jours, mon petit Goudurix. Tu viendras manger le sanglier à la maison et je te raconterai la guerre des Gaules. Ah, Gergovie... </i></p>",
	"choix" => array ("prendre l'objet"),
	"image" => "images/agecanonix.png"
	),
	"6-1" => array (
	"texte" => "<p> Soulagé de ne pas avor droit à tous les chapitres de ce glorieux récit, tu quittes la hutte d'Agecanonix et retournes en <strong>2</strong></p>
	<p><i>Tu as ajouté le glaive à ton équipement ! (+3 en combativité)</i></p>",
	"choix" => array ("2"),
	"image" => "images/agecanonix.png"
	),
	"7" => array (
	"texte" => "<p><i>- Goudurix, on ne se lève pas de table avant d'avoir terminé son repas. Tu n'as pas fini ton second sanglier. On ne vous apprend donc plus les bonnes manières à Lutèce ? </i></p>
	<p><i>Je t'interdis d'aller te battre avec ces voyous</i></p>
	<p><ul><li>Tu ne peux pas désobéir à Bonnemine après ce festin. Va en <strong>22</strong></li></ul></p>",
	"choix" => array ("22"),
	"image" => "none"
	),
	"8" => array (
	"texte" => "<p>Le messager, qui s'en retourne, emprunte le chemin qui mène au village de Moralélastix, perché sur une falaise à quelques <i>milia passuum*</i> de là. Tout excité par ton audace, tu le suis à distance et franchis la porte du village lorsqu'un léger craquement se fait entendre sur la gauche, près de la palissade.</p>
	<p><ul><li>Tu continues ta filature avec plus de précautions : passe une épreuve de difficulté <strong>4</strong></li><li>Tu préfère aborder l'émissaire pour discuter avec lui, espérant obtenir plus d'informations sur Moralélastix et avoir des détails sur ce curieux rendez-vous. Va en <strong>23</strong></li><li>Tu abandonnes ta filature pour aller voir en <strong>4</strong> d'où vient ce curieux bruit</li></ul></p>
	<p><i>* Les romains comptaient les distances en pas. Un milia passuum est donc, en quelque sorte, un kilopas.</i></p>",
	"choix" => array ("epreuve d'adresse","23","4"),
	"epreuve" => array ( "difficulte" => "4","succes" => "19","echec" => "11"),
	"image" => "none"
	),
	
	"10" => array (
	"texte" => "<p>Dommage, une bagarre c'est toujours intéressant.</p>
	<p><strong>SPLATCH !</strong> Un poisson perdu tombe dans l'eau de ton bain. En voilà des manières !</p>
	<p>Comme la moindre des politesse est de rendre à son propriétaire ce qui lui appartient, tu te lèves et renvoies ce projectile par la fenêtre. Pouah ! Quelle odeur infecte !</p>
	<p>Mais pourquoi les poissons sont-ils plus frais à Lutèce alors que nous sommes au bord de la mer ?</p>
	<p><ul><li>Ce bain a assez duré, il est temps d'aller faire un tour du côté de cette bataille rangée, en <strong>27</strong></li></ul></p>",
	"choix" => array ("27"),
	"image" => "images/poisson.png"
	),
	"11" => array (
	"texte" => "<p>Tu suis le Gauois à distance, l'important c'est de ne pas se faire remarquer.</p>
	<p>Naturellement, après quelques centaines de pas, tu poses le pied sur une branche sèche. <strong> CRAAAAC</strong></p>
	<p><i>- Depuis quand les gaulois s'éspionnent-ils entre eux ??? Moralélastix entendra parler de vos méthodes !</i></p>
	<p><ul><li>Dépité, ne sachant quoi répondre, tu retournes au village, en <strong>2</strong></li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"12" => array (
	"texte" => "<p>Panoramix te demande de le suivre chez lui, il désire avoir une petite conversation avec toi</p>
	<p><ul><li>Va en <strong>17</strong></li></ul></p>",
	"choix" => array ("17"),
	"image" => "none"
	),
	"13" => array (
	"texte" => "<p><i>- QUOI, ALESIA ???</i></p>
	<p><i>- COMMENT, ALESIA ???</i></p>
	<p><i>- Je ne connais pas Alesia ! Personne ne sait où c'est, Alesia  ! Hors d'ici, voyou, chenapan, Gallo-Romain !!</i></p>
	<p>Prenant tes jambes à ton cou, tu quittes la hute. Agecanonix reste devant la porte, brandissant sa canne et te jetant des anathèmes (mais non, ça ne se mange pas).</p>
	<p><ul><li>Tu t'enfuis en <strong>2</strong>.</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"14"=> array (
		"texte" => "<p>Quelle chance d'avoir une tante qui cuisine aussi bien !  Ce sanglier rôti est vraiment délicieux ! Quelle différence avec ce que tu manges habituellement dans les <i>Acutae Tabernae*</i> de Luèce !</p>
		<p>Le bon goût du sanglier te rappelle les parties de chasse en forêt avec tes amis Asterix et Obelix. Une discussion animée interrompt alors ta rêverie : Les voix mélodieuses du poissonier Ordralfabetix et du forgeron Cetautomatix.</p>
		<p><ul><li>Une bonne vieille bagarre gauloise s'annonce. Tu ne veux pas rater ça. Tu te lèves et te diriges vers la porte. Va en <strong>7</strong></li><li>Tu n'as mangé qu'un sanglier et demi et tu as encore faim. Tant pis pour la bagarre, mieux vaut rester à table, va en <strong>22</strong></li></ul></p>",
		"choix" => array ("7","22"),
		"image" => "images/sanglier_grille.png"
	
	),
	"15" => array (
	"texte" => "<p>Qu'es-ce que c'est ? Non , tu n'es pas dans ta chambre à Lutèce mais couché dans la hutte du druide Panoramix.</p>
	<p>Ta jambe, douloureuse, est couverte de cataplasmes de feuilles de plantago. Panoramix est penché sur toi, un sourire dans sa barbe blanche.</p>
	<p><i>-Ne t'en fais pas, Goudurix, ce n'est rien. Ta jambe sera bientôt remise, mais tu ne dois pas bouger d'ici pendant sept jours.</i></p>
	<p><i>Tiens, bois un peu de cette potion, tu auras moins mal. Si tu n'avais pas préjugé de ta force, j'aurais sans doute eu une petite mission à te confier.</i></p>
	<p><strong>Ton aventure est TERMINEE</strong>, avant même d'avoir commencé....</p>",
	"choix" => array ("vous avez perdu"),
	"image" => "none"
	),
	"16" => array (
	"texte" => "<p>Après quelques échanges de coups, le légionnaire s'écroule.</p>
	<p><ul><li>Tu attends qu'il reprenne ses esprits pour l'interroger, en <strong>28</strong></li><li>Tu restes au village, en <strong>2</strong></li></ul></p>",
	"choix" => array ("28","2"),
	"image" => "none"
	),
	"17" => array (
	"texte" => "<p><i>- Mon petit Goudurix, je regrette que tu ne puisses retrouver ni ton oncle, ni tes amis Asterix et Obelix</i>, dit Panoramix.</p>
	<p><i>Abraracourcix n'était pas en forme ces derniers temps. Son foie est fragile; je lui ai conseillé de faire une cure à la station thermale d'Aquae Calidae, dans l'établissement de mon honorable confrère et amis le druide Diagnostix. Notre chef est donc parti escorté d'Asterix et d'Obelix.</i></p>
	<p><i>Mais il n'est pas rentré, alors que sa cure devrait être terminée depuis plusieurs jours. Cela m'inquiète. Abraracourcix doit rencontrer un autre chef gaulois, Moralélastix, c'est la tradition, dans une demi-lune. Or Moralélastix s'entend trop bien avec les romains. Il est , de plus, très susceptible et je crains qu'il ne considère l'absence d'Abraracourcix à ce rendez-vous comme un affront et un prétexte pour s'allier définitivement avec les romains.</i></p>
	<p><i>La paix, très précaire , que nous connaissons en Armorique serait alors fortement compromise. Il faut envoyer quelqu'un à Aquae Calidae pour retrouver ton oncle. J'éspère qu'il ne lui est rien arrivé de fâcheux...</i></p>
	<p><ul><li>Pas d'hésitation. Tu te portes volontaire pour aller chercher ton oncle à Aquae Calidae. Les voyagesforgent la jeunesse, va en <strong>25</strong></li><li>Les voyages forment la jeunesse, mais les vacances aussi. Tu préfères rester pour l'instant au village Gaulois. Va en <strong>29</strong></li></ul></p>",
	"choix" => array ("25","29"),
	"image" => "none"
	),
	"18" => array (
	"texte" => "<p>Les poissons volent !</p>
	<p>Voilà une bonne vieille bagarre à la gauloise. Tu oses à peine imaginer une scène semblable sur les grandes places de Lutèce. Tout le monde bataille dans la joie et la bonne humeur.</p>
	<p><ul><li>Fatigué par le voyage tu vas en <strong>27</strong> assister à cette charmante scène folklorique de la Gaule profonde sans y prendre part.</li>
	<li>Tu manquais d'activité physique à Lutèce et tu te précipites dans la mêlée , va en <strong>3</strong></li></ul></p>",
	"choix" => array ("27","3"),
	"image" => "none"
	),
	"19" => array (
	"texte" => "<p>Dissimulé derrière les arbres, tu vois le gaulois pénetrer dans la hute de Moralélastix. Il y a des guerriers partout ! </p>
	<p>Difficile d'enquêter dans ces conditions. Enfin, en tout cas, ce messager disait vrai.</p>
	<p><ul><li>Tu retournes donc au village, en <strong>2</strong> pour faire un autre choix.</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"20"=> array (
		"texte" => "<p>Pour la préparation du bain, tu accompagnes Bonnemine au puits. En chemin, tu remarques que la hutte de tes amis Asterix et Obélix semble desertée. </p><p>De retour chez ton oncle, tu installes la bassine pleine dans un coin et tu plonges avec délices dans l'eau.</p><p> Des échos de voix te parviennent. Il est question de poissons à la fraîcheur douteuse ?!? Ca sent la bagarre !</p>
		<p><ul>
		<li>
			Comme tu es vraiment sale, tu termines ta toilette. <strong> Va en 10. </strong>
		</li>
		<li>
			Ce serait trop dommage de rater ça ! Tu sors discretement du bain et te rhabilles... en espérant que Bonnemine ne t'apercevra pas.
			<strong><i>Passe une épreuve d'adresse (difficulté 3).</i></strong>
		</li>
		</ul></p>",
		"choix" => array ("10","epreuve d'adresse"),
		"epreuve" => array ( "difficulte" => "3","succes" => "18","echec" => "5"),
		"image" => "none"
	
	),
	"21" => array (
	"texte" => "<p><i>- Petit, avant de t'apprendre qui étaient nos ancêtres, nous allons parler de l'histoire contemporaine. Comme tout bon Gaulois, tu dois savoir quelle fut la plus grande bataille de la guerre des Gaules ?</i></p>
	<p>Facile, tu réponds :</p>
	<p><ul><li>\"Alesia\", va en <strong>13</strong></Ii><li>\"Gergovie\", va en <strong>6</strong></li></ul></p>",
	"choix" => array ("13","6"),
	"image" => "images/agecanonix.png"
	),
	"22" => array (
	"texte" => "<p>Après un échange de banalité avec Bonnemine, qui désire avoir des nouvelles de sa famille, de ton père et de la dernière mode à Lutèce, tu sors de la hutte. Au passage, ta tante te glisse quelques pièce dans la main. </p>",
	"choix" => array ("prendre l'argent"),
	"image" => "none"
	),
	"22-1" => array (
	"texte" => "<p>Ta joie sera de courte durée : 5 sesterces, autant dire rien du tout ! </p>
	<p>Ah ! Ces provinciaux, ils te prennent encore pour un gamin ! Ou alors ils ne sont pas au courant des prix pratiqués à Lutèce.</p>
	<p><ul><li>La bagarre est en <strong>27</strong></li></ul></p>",
	"choix" => array ("27"),
	"image" => "none"
	),
	"23" => array (
	"texte" => "<p><i>- Qui est donc ce chef, Moralélastix ? Je suis arrivé depuis peu dans la région et je n'en ai pas beaucoup entendu parler.</i></p>
	<p><i>- Moralélastix</i>, répondit-il,<i>est le chef du village sur la falaise. Grâce à lui, nous vivons en paix avec les romains comme avec les autres gaulois. Il est pacifique mais quelque peu susceptible.</i></p>
	<p><i>J'espère qu' Abraracourcix n'oubliera pas le rendez-vous, car de nombreux gaulois, y compris chez nous, pourraient le regretter...</i></p>
	<p>Impossible d'en savoir plus. Moralélastix s'entend donc plutôt bien avec les romains et, de l'avis même de son messager, n'est guère sympthique.</p>
	<p><ul><li>Un peu déçu par cette brève enquête, tu quittes ton compagnon pour retourner au village, en <strong>2</strong></li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"24" => array (
	"texte" => "<p>Bonnemine a quitté la hutte. Elle est sans doute partie faire des emplettes ou boire un lait de chèvre avec les dames du village.</p>
	<p><ul><li>Retourne en <strong>2</strong> pour faire un autre choix</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"25" => array (
	"texte" => "<p><i>- Je te félicite pour ton courage, mon petit. Mais ne pars pas sans potion magique. Voici une gourde, utilise la à bon escient. Prends aussi cette bourse, tu auras besoin d'argent. Et voilà un sac de provisions et quelques torches. Le plus sage est désormais d'aller à pied jusqu'à Condate, où tu pourras acheter un cheval ou un char.</i></p>
	",
	"choix" => array ("prendre les objets"),
	"image" => "none"
	),
	"25-1" => array (
	"texte" => "<p><i> Tu rajoutes à ton équipement 5 doses de potions magiques à boire , évidemment, avec modération. Egalement 30 sesterces, cinq torches et un sac de nourriture, ce qui devra te suffire pour le voyage.</i></p>
	<p><ul><li>Tu quittes alors la hutte de Panoramix pour retourner en <strong>2</strong>, sur la place du village.</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"26" => array (
	"texte" => "<p>La hutte d'Asterix et Obelix est fermée. Dommage. Sans eux, tes vacances vont être plutôt mornes.</p>
	<p><ul><li>Tu crois ça ?? Retournes en <strong>2</strong> et fais un autre choix</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"27" => array (
	"texte" => "<p>Trop tard ! Chacun se relève, s'époussette, ajuste ses vêtements et prend l'air dégagé</p>
	<p>Un étranger vient d'arriver sur la place du village. Ordralfabetix ramsse ses poissons en prévision de la prochaine fois. L'étranger, un Gaullois, s'approche de la maison du chef et annonce :</p>
	<p><i>- Un message du chef Moralélastix pour le chef Abraracourcix !</i></p>
	<p>Panoramix s'avance alors : <i> - Notre chef est absent pour quelques jours , mais nous lui transmettrons ton message </i></p>
	<p><i>- Je viens simplement rappeler à Abraracourcix que la traditionnelle rencontre entre les chefs de nos deux villages aura lieu dans une demi-lune dans nos murs</i>,dit l'envoyé.</p>
	<p><i>Mon chef serait très irrité si votre chef manquait à ses obligations. Il en conclurait que l'amitié entre nous est rompue et que l'alliance avec les romains est inévitable, sinon nécessaire.</i></p>
	<p>Panoramix tente d'apporter quelques explications, d'obtenir au moins un délai, mais le messager lui tourne le dos et s'apprête à partir. De quoi faire grommeler le vieux druide.</p>
	<p><i>Eh bien</i>, dit il,<i>tout cela ne me dit rien qui vaille ! Depuis l'affaire du chaudron* , nous avons appris à nous méfier de Moralélastix. Je voudrais bien savoir quelles sont ses véritables intentions.</i></p>
	<p>* Voir 'Astérix et le chaudron'.</p>
	<p><ul><li>Débordant d'initiative, tu suis l'envoyé de Moralélastix. C'est l'occasion d'en savoir plus.  <strong>Va en 8</strong></li><li>Tu vas en <strong>12</strong> demander des explications à Panoramix. Mais cette visite impromptue l'a apparemment mis de mauvaise humeur.</li></ul></p>",
	
	"choix" => array ("8","12"),
	"image" => "none"
	),
	"28" => array (
	"texte" => "<p>Le romain saigne abondamment du nez. Sous la menace d'un coup supplémentaire au même endroit, il avoue qu'il vient du camp de Babaorum. Le centurion Faipalgugus a appris que le chef Abraracourcix avait quitté le village et a envoyé ce légionnaire en mission pour tenter de découvrir où était passé le grand chef des irréductibles gaulois.</p>
	<p>Plus de doute, les romains cherchent Abraracourcix.</p>
	<p><ul><li>Tu rentres songeur au village, en <strong>2</strong>, tandis que le légionnaire se dirige en boitant vers le camp de Babaorum.</li></ul></p>",
	"choix" => array ("2"),
	"image" => "none"
	),
	"29" => array (
	"texte" => "<p>Quelle malchance ! Ce pouvait être le prélude à une histoire passionante et mouvementée. <strong> TON AVENTURE EST TERMINEE </strong>, mais tu passeras malgré tout d'agréable vacances chez tes amis gaulois.</p>",
	"choix" => array ("vous avez perdu"),
	"image" => "none"
	),
	"30" => array (
	"texte" => "<h1>Chapitre 2 : Un départ mouvementé ! </h1>",
	"choix" => array ("none"),
	"image" => "none"
	)

);







?>


