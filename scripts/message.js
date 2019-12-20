function getMessage() {
  const sendBtn = document.getElementById("messagesubmit");
  const form = document.getElementById("message-form");
  sendBtn.addEventListener("click", async function(e) {
    e.preventDefault();

    // grab message
    const formData = new FormData(form);
    const data = {
      receiver: formData.get("receiver"),
      message: formData.get("message")
    };

    try {
      const response = await sendMessage(data);

      // reset form message field
      form.reset();
      // display message from server
      document.querySelector(".error_mess").innerHTML = response.message;
    } catch (error) {
      console.log(error);
    }

    // send message async
  });
}

async function sendMessage(formData) {
  try {
    const { data } = await axios.post("sendmessage.php", formData);

    console.log(data);
    return data;
  } catch (error) {
    console.log(error);
  }
}

// load function on DOM Loaded
document.addEventListener("DOMContentLoaded", getMessage);
