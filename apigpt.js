document.addEventListener('DOMContentLoaded', (event) => {
    // Function to send a message and receive a response from the chatbot
    async function chatWithBruno(message) {
        const url = "https://api.edenai.run/v2/text/chat";
        const headers = {
            "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiOWRjYWM5MzQtMTBmYi00MDMzLWI2MTgtYzFjNWJmNzFjNDc4IiwidHlwZSI6ImFwaV90b2tlbiJ9.rpDUJ86v1nQeGeANO7Ss28Qhbf0abCJ0kW93xWXpCMk",
            "Content-Type": "application/json"
        };
        const payload = {
            "providers": "openai",
            "text": message,
            "chatbot_global_action": "Act as a Diet Trainer.Note that while giving diet plans you have to give it in html,css format (systematically) and add some bootstrap styling to look styles.Do not provide any other information only give diet plan.",
            "temperature": 0.0,
            "max_tokens": 1000,
        };

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(payload)
            });
            const result = await response.json();
            return result['openai']['generated_text'];
        } catch (error) {
            console.error('Error:', error);
            return 'Error in fetching response';
        }
    }

    // Event listener for the send button
    document.getElementById('sendButton').addEventListener('click', async () => {
        const goal = document.querySelector('input[name="goal"]:checked').value;
        const diet = document.querySelector('input[name="diet"]:checked').value;
        const weight = document.getElementById('weight').value;
        const height = document.getElementById('height').value;

        const foods = [];
        document.querySelectorAll('input[name="food"]:checked').forEach(food => {
            foods.push(food.value);
        });

        let message = "create a 7 days diet chart for calorie description if my weight is " + weight + " height is " + height + "cm i am a " + diet + " my aim is " + goal + " my preferences are" + foods + "create a table for day one to day seven for whole week have colums for breakfast, lunch, after noon snack and dinner combine the whole chart in one";
        //end
        
        document.getElementById('loading-animation').style.display = 'block';

        const response = await chatWithBruno(message);
        document.getElementById('loading-animation').style.display = 'none';
       
        document.getElementById('responseOutput').innerHTML = response;
    });
});
