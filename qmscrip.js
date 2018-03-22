$( document ).ready(function() {
	generate();
	function generate(){
    var quotes = ["If the single man plant himself indomitably on his instincts, and there abide, the huge world will come round to him.^Ralph Emerson", "The winner ain't the one with the fastest car it's the one who refuses to lose.^Dale Earnhardt", "Who sows virtue reaps honour.^Leonardo da Vinci", "Into each life rain must fall but rain can be the giver of life and it is all in your attitude that makes rain produce sunshine.^Byron Pulsifer", "No yesterdays are ever wasted for those who give themselves to today.^Brendan Francis", "When I dare to be powerful, to use my strength in the service of my vision, then it becomes less and less important whether I am afraid.^Audre Lorde", "A beautiful thing is never perfect.^Unknown", "The hardest thing in the world is to simplify your life. It’s so easy to make it complex.^Unknown", "Freedom is the right to live as we wish.^Epictetus", "If you correct your mind, the rest of your life will fall into place.^Lao Tzu", "Most great people have attained their greatest success just one step beyond their greatest failure.^Napoleon Hill", "Beware of missing chances; otherwise it may be altogether too late some day.^Franz Liszt", "To listen well is as powerful a means of communication and influence as to talk well.^John Marshall", "I do not believe in a fate that falls on men however they act; but I do believe in a fate that falls on them unless they act.^Buddha", "In the middle of every difficulty lies opportunity.^Albert Einstein", "The way we communicate with others and with ourselves ultimately determines the quality of our lives.^Tony Robbins"
];
randomQuote = quotes[Math.floor(Math.random()*quotes.length)];
    quoteAuthor=randomQuote.split("^");
		$('.adage').text(quoteAuthor[0]);
    $('.author').text(quoteAuthor[1]);
  }
  
  
$(".button").on( "click", function() {
    generate();
});  
  
});
