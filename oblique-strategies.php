<?php
/**
 * @package Oblique_Strategies
 * @version 0.1
 */
/*
Plugin Name: Oblique Strategies
Plugin URI: http://xn--vroniquebellamy-bnb.fr/en/resources/plugins/oblique-strategies/
Description: This is not just a plugin, it includes a list of the Oblique Strategies by Brian Eno. When activated you will see the text from a random Oblique Strategies card in the upper right of your admin screen on every page.
Author: Véronique Bellamy
Version: 0.1
Author URI: https://xn--vroniquebellamy-bnb.fr/
*/

function oblique_strategies_get_strategy() {
	/** These are the Oblique Strategies */
	$strategies = "Abandon desire
Abandon normal instruments
Accept advice
Accretion
Adding on
A line has two sides
Allow an easement (an easement is the abandonment of a stricture)
Always the first steps
Are there sections? Consider transitions
Ask people to work against their better judgement
Ask your body
Assemble some of the elements in a group and treat the group
Balance the consistency principle with the inconsistency principle
Be dirty
Be extravagant
Be less critical more often
Breathe more deeply
Bridges -build -burn
Cascades
Change ambiguities to specifics
Change instrument roles
Change nothing and continue with immaculate consistency
Change specifics to ambiguities
Children -speaking -singing
Cluster analysis
Consider different fading systems
Consider transitions
Consult other sources -promising -unpromising
Courage!
Cut a vital connection
Decorate, decorate
Define an area as 'safe' and use it as an anchor
Destroy nothing; Destroy the most important thing
Discard an axiom
Disciplined self-indulgence
Disconnect from desire
Discover the recipes you are using and abandon them
Discover your formulas and abandon them
Display your talent
Distorting time
Do nothing for as long as possible
Don't avoid what is easy
Don't be afraid of things because they're easy to do
Don't be frightened of cliches
Don't be frightened to display your talents
Don't break the silence
Don't stress one thing more than another
Do something boring
Do something sudden, destructive and unpredictable
Do the last thing first
Do the words need changing?
Do we need holes?
Emphasize differences
Emphasize repetitions
Emphasize the flaws
Faced with a choice, do both
Fill every beat with something
Find a safe part and use it as an anchor
From nothing to more than nothing
Ghost echoes
Give the game away
Give way to your worst impulse
Go outside. Shut the door.
Go slowly all the way round the outside
Go to an extreme, move back to a more comfortable place
Honor thy error as a hidden intention
How would someone else do it?
How would you have done it?
Humanise something free of error
Idiot glee (?)
Imagine the piece as a set of disconnected events
Infinitesimal gradations
Intentions -nobility of -humility of -credibility of
In total darkness, or in a very large room, very quietly
Into the impossible
Is it finished?
Is the intonation correct?
Is the style right?
Is there something missing?
It is quite possible (after all)
It is simply a matter of work
Just carry on
Listen to the quiet voice
Look at the order in which you do things
Look closely at the most embarrassing details and amplify them
Lost in useless territory
Lowest common denominator
Magnify the most difficult details
Make a blank valuable by putting it in an exquisite frame
Make an exhaustive list of everything you might do and do the last thing on the list
Make a sudden, destructive unpredictable action; incorporate
Make it more sensual
Make what's perfect more human
Mechanicalise something idiosyncratic
Move towards the unimportant
Mute and continue
Not building a wall but making a brick
Once the search is in progress, something will be found
Only a part, not the whole
Only one element of each kind
(Organic) machinery
Pac White's non-blank graphic metacard
Overtly resist change
Question the heroic approach
Remember those quiet evenings
Remove ambiguities and convert to specifics
Remove a restriction
Remove specifics and convert to ambiguities
Repetition is a form of change
Retrace your steps
Revaluation (a warm feeling)
Reverse
Short circuit (example; a man eating peas with the idea that they will improve his virility shovels them straight into his lap)
Simple subtraction
Simply a matter of work
Slow preparation, fast execution
State the problem in words as clearly as possible
Take a break
Take away the elements in order of apparent non-importance
The inconsistency principle
The most important thing is the thing most easily forgotten
The tape is now the music
Think inside the work; Think outside the work
Think of the radio
Tidy up
Towards the insignificant
Trust in the you of now
Try faking it
Turn it upside down
Use an old idea
Use an unacceptable colour
Use cliches
Use fewer notes
Use filters
Use something nearby as a model
Use 'unqualified' people
Use your own ideas
Voice your suspicions
Water
What are the sections sections of? Imagine a caterpillar moving
What are you really thinking about just now?
What context would look right?
What is the reality of the situation?
What is the simplest solution?
What mistakes did you make last time?
What to increase? What to reduce? What to maintain?
What were you really thinking about just now?
What wouldn't you do?
What would your closest friend do?
When is it for?
Where is the edge?
Which parts can be grouped?
Work at a different speed
Would anybody want it?
You are an engineer
You can only make one dot at a time
You don't have to be ashamed of using your own ideas
Your mistake was a hidden intention
[blank white card]";

	// Here we split it into lines.
	$strategies = explode( "\n", $strategies );

	// And then randomly choose a line.
	return wptexturize( $strategies[ mt_rand( 0, count( $strategies ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function oblique_strategies() {
	$chosen = oblique_strategies_get_strategy();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="oblique"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Card from Oblique Strategies from Brian Eno:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'oblique_strategies' );

// We need some CSS to position the paragraph.
function oblique_css() {
	echo "
	<style type='text/css'>
	#oblique {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #oblique {
		float: left;
	}
	.block-editor-page #oblique {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#oblique,
		.rtl #oblique {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'oblique_css' );
