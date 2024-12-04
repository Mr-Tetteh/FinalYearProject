<script setup>
import { ref, onMounted, nextTick } from "vue";
import axios from "axios";

// Reactive state variables
const messages = ref([]);
const newMessage = ref("");

// Function to fetch messages from the server
const getMessages = async () => {
  try {
    const response = await axios.get("/messages");
    messages.value = response.data;
    scrollToBottom(); // Scroll to the bottom after fetching messages
  } catch (err) {
    console.error(err.message);
  }
};

// Function to post a new message
const postMessage = async (text) => {
  try {
    await axios.post("/message", { text });
    await getMessages(); // Refresh messages after posting
  } catch (err) {
    console.error(err.message);
  }
};

// Function to send a new message
const sendMessage = () => {
  if (newMessage.value.trim() !== "") {
    postMessage(newMessage.value.trim());
    newMessage.value = ""; // Clear the input field
  }
};

// Function to scroll to the bottom of the message list
const scrollToBottom = () => {
  nextTick(() => {
    const messageList = document.getElementById("messagelist");
    if (messageList) {
      messageList.scrollTop = messageList.scrollHeight;
    }
  });
};

// Fetch messages on component mount and listen for real-time updates
onMounted(() => {
  getMessages();

  window.Echo.private("channel_for_everyone").listen("GotMessage", () => {
    getMessages(); // Fetch messages when an event is received
  });
});
</script>

<template>
  <div class="container">
    <div class="chat-box" id="messagelist">
      <div v-for="(message, index) in messages" :key="index" class="message">
        <strong>{{ message.user.name }}:</strong> {{ message.text }}
        <small class="text-muted float-right">{{ message.time }}</small>
      </div>
    </div>
    <div class="input-area">
      <input
          v-model="newMessage"
          @keyup.enter="sendMessage"
          type="text"
          placeholder="Type your message here..."
      />
      <button @click="sendMessage">Send</button>
    </div>
  </div>
</template>

<style scoped>
.chat-box {
  border: 1px solid #ccc;
  padding: 10px;
  max-height: 300px;
  overflow-y: auto;
}

.message {
  margin-bottom: 10px;
}
</style>
