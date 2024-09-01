document.getElementById('test-form').addEventListener('submit', function(event) {
    let allAnswered = true;
    const questions = document.querySelectorAll('input[type="radio"]');
    const questionGroups = {};
    let firstUnansweredElement = null;

    questions.forEach(function(question) {
        if (!questionGroups[question.name]) {
            questionGroups[question.name] = false;
        }
        if (question.checked) {
            questionGroups[question.name] = true;
        }
    });

    for (const question in questionGroups) {
        if (!questionGroups[question]) {
            allAnswered = false;
            if (!firstUnansweredElement) {
                firstUnansweredElement = document.querySelector(`input[name="${question}"]`);
            }
        }
    }

    if (!allAnswered) {
        event.preventDefault();
        if (firstUnansweredElement) {
            firstUnansweredElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        alert('Please answer all questions before submitting.');
    }
});