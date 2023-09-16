<template>
    <div>
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="../images/logo.png" alt="image" class="icon-shape border rounded-circle" width="55" height="55">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">User Name</h4>
                        <p class="chatbox__description--header">admin role</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>
                        <!--                    <div class="messages__item messages__item&#45;&#45;visitor">
                                                Can you let me talk to the support?
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;visitor">
                                                Can you let me talk to the support?
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;operator">
                                                Sure!
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;visitor">
                                                Need your help, I need a developer in my site.
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;operator">
                                                Hi... What is it? I'm a front-end developer, yay!
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;operator">
                                                Hi... What is it? I'm a front-end developer, yay!
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;visitor">
                                                Need your help, I need a developer in my site.
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;operator">
                                                Hi... What is it? I'm a front-end developer, yay!
                                            </div>
                                            <div class="messages__item messages__item&#45;&#45;typing">
                                                <span class="messages__dot"></span>
                                                <span class="messages__dot"></span>
                                                <span class="messages__dot"></span>
                                            </div>-->
                    </div>
                </div>
                <div class="chatbox__footer">
                    <!--
                        <img src="{{ asset('frontend/chat/') }}/images/icons/emojis.svg" alt="">
                        <img src="{{ asset('frontend/chat/') }}/images/icons/attachment.svg" alt="">
                        <img src="{{ asset('frontend/chat/') }}/images/icons/microphone.svg" alt="">
                    -->
                    <input type="text" placeholder="Write a message...">
                    <p class="chatbox__send--footer">
                        <svg class="xsrhx6k" height="20px" viewBox="0 0 24 24" width="20px">
                            <path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 C22.8132856,11.0605983 22.3423792,10.4322088 21.714504,10.118014 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,1.00636533 1.77946707,1.4776575 C0.994623095,2.10604706 0.8376543,3.0486314 1.15159189,3.99121575 L3.03521743,10.4322088 C3.03521743,10.5893061 3.34915502,10.7464035 3.50612381,10.7464035 L16.6915026,11.5318905 C16.6915026,11.5318905 17.1624089,11.5318905 17.1624089,12.0031827 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z"></path></svg>
                    </p>
                </div>
            </div>
            <div class="chatbox__button" id="clickButtonGroup">
                <button id="clickButton">button</button>
            </div>
        </div>
    </div>
</template>


<script setup>

const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '<img src="http://127.0.0.1:8000/frontend/chat/images/icons/chatbox-icon.svg" />',
    isNotClicked: '<img src="http://127.0.0.1:8000/frontend/chat/images/icons/chatbox-icon.svg" />'
}
console.log(document.querySelector(".chatbox__button"));
</script>


