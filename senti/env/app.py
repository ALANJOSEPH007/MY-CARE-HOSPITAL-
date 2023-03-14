from flask import Flask, request
from textblob import TextBlob
app = Flask(__name__)

@app.route('/sentiment', methods=['POST'])
def sentiment_analysis():
    texts = request.json.get('texts')
    sentiment_scores = []
    for text in texts:
        blob = TextBlob(text)
        sentiment = blob.sentiment.polarity
        sentiment_scores.append(sentiment)
    average_sentiment = sum(sentiment_scores) / len(sentiment_scores)
    return {'sentiment': average_sentiment}


if __name__ == '__main__':
    app.run()