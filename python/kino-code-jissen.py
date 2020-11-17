class Student:
  def __init__(self, name):
    self.name = name
  def calculateAvg(self, score):
    sum = 0
    for i in score:
      sum += i
    avg = sum / len(score)
    return avg

  def judge(self, avg):
    if avg >= 60.0:
      result = 'passed'
    else:
      result = 'failed'
    return result

seito = Student('Taro')
score = [50, 44, 98, 75, 47]
avg = seito.calculateAvg(score)
result = seito.judge(avg)

print(avg)
print(seito.name + 'さんの平均点は' + str(avg) + '点です。')
print(result + 'です。')
