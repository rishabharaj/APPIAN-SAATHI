document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const fileInput = document.querySelector("#document");
        const formData = new FormData();
        formData.append("document", fileInput.files[0]);

        try {
            const response = await fetch("/routes/routes.php", {
                method: "POST",
                body: formData,
            });

            if (!response.ok) {
                throw new Error("Failed to upload the document.");
            }

            const result = await response.json();
            displayResults(result);
        } catch (error) {
            displayError(error.message);
        }
    });

    function displayResults(data) {
        const container = document.querySelector(".container");
        container.innerHTML = `
            <h1>Processing Results</h1>
            <h3>Classification:</h3>
            <p>${data.classification}</p>
            <h3>Summary:</h3>
            <p>${data.summary}</p>
            <h3>Metadata:</h3>
            <ul>
                <li><strong>Name:</strong> ${data.metadata.name}</li>
                <li><strong>Date:</strong> ${data.metadata.date}</li>
                <li><strong>Amount:</strong> ${data.metadata.amount}</li>
            </ul>
            <a href="/">Upload Another Document</a>
        `;
    }

    function displayError(errorMessage) {
        const container = document.querySelector(".container");
        container.innerHTML = `
            <h1>Error</h1>
            <p>${errorMessage}</p>
            <a href="/">Go Back</a>
        `;
    }
});
