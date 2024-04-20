import telebot
import os
from telebot import types
import requests
import random

token = "6716971675:AAFBAi2MjoIRSSdXvcmKio4Y9AsX6SciYc8"

bot = telebot.TeleBot(token)
ds = types.InlineKeyboardButton(text='- بدء - START -', callback_data='start')
me = types.InlineKeyboardButton(text='program', url='https://t.me/you_off01')


@bot.message_handler(commands=['start'])
def start(message):
  xz = message.from_user.first_name
  mss = types.InlineKeyboardMarkup()
  mss.row_width = 1
  mss.add(ds, me)
  bot.send_message(message.chat.id,
                   f''' اهلا بك ({xz})''',
                   parse_mode='html',
                   reply_markup=mss)


@bot.callback_query_handler(func=lambda call: True)
def qwere(call):
  if call.data == 'start':
    li(call.message)


def li(message):
  error = 0
  done = 0

  while True:
    us = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ_1234567890'
    user = ("".join(random.choice(us) for i in range(5)))

    req = requests.get(f'https://t.me/{user}').text
    if '"robots"' in req:
      done += 1
      bot.send_message(message.chat.id,
                       f"""Hit User Tele
•----------------------------------------•
User✅ - ( @{user} )
•----------------------------------------•
@you_off01 , @matrexdz """,
                       parse_mode="html")
    else:
      error += 1
      ws = types.InlineKeyboardMarkup(row_width=1)
      v1 = types.InlineKeyboardButton(f" Good user [{done}]",
                                      callback_data='mn')
      v2 = types.InlineKeyboardButton(f" BAD user [{error}]",
                                      callback_data='mnm')
      Check = types.InlineKeyboardButton(f" Check [{user}]",
                                         callback_data='asnm')
      v3 = types.InlineKeyboardButton(f" Arithmetic  ",
                                      url="https://t.me/T62RS",
                                      callback_data='tynn')
      v4 = types.InlineKeyboardButton(f" my tome   ",
                                      url="https://t.me/q5_u8",
                                      callback_data='mnn')
      ws.add(v1, v2, v3, v4, Check)
      bot.edit_message_text(chat_id=message.chat.id,
                            message_id=message.message_id,
                            text="(اهلا بك بدأ الصيد الان )",
                            parse_mode='markdown',
                            reply_markup=ws)


print('- RUN BOT -')
bot.polling(True)
