# 50. Pow(x, n)

## Condition

Implement `pow(x, n)`, which calculates *x* raised to the power *n* (*x<sup>n</sup>*).

**Example 1:**

```
Input: 2.00000, 10
Output: 1024.00000
```

**Example 2:**

```
Input: 2.10000, 3
Output: 9.26100
```

**Example 3:**

```
Input: 2.00000, -2
Output: 0.25000
Explanation: 2-2 = 1/22 = 1/4 = 0.25
```

**Note:**

- -100.0 < *x* < 100.0
- *n* is a 32-bit signed integer, within the range [−2<sup>31</sup>, 2<sup>31 − 1</sup>]

## Условие

Реализовать `pow(x, n)`, который вычисляет *x*, возведенный в степень *n* (*x<sup>n</sup>*).

**Пример 1:**

```
Input: 2.00000, 10
Output: 1024.00000
```

**Пример 2:**

```
Input: 2.10000, 3
Output: 9.26100
```

**Пример 3:**

```
Input: 2.00000, -2
Output: 0.25000
Explanation: 2-2 = 1/22 = 1/4 = 0.25
```

**Примечание:**

- -100,0 < *х* <100,0
- *n* - 32-битовое целое число со знаком в диапазоне [−2<sup>31</sup>, 2<sup>31 − 1</sup>]

## Решение. Двигаться от *n* к 1

https://medium.com/@lenchen/leetcode-50-pow-x-n-f4c37c41646d

Необходимо взять модуль от степени *|n|*.

Необходимо делить это значение на 2 на каждом шаге и при этом домножать текущее значение `$current` на себя. Причем если деление выполняется с остатком `1`,  то нужно дополнительно домножить на `x` (или `current`???).

```python
def myPow(self, x, n):
        """
        :type x: float
        :type n: int
        :rtype: float
        """

        # approach: iterative composite result by separate n into binary

        result = 1
        current = x
        m = -n if n < 0 else n
        while m > 0:
            # pick value into result
            if m & 1:
                result *= current
            current *= current
            m >>= 1

        return 1 / result if n < 0 else result
```

Более понятна рекурсивная процедура. 

Здесь используется рекурсивная формула:

```
pow(x, n) = pow(x, n/2) * pow(x, n/2) * (n%2===1 ? x : 1 )
```

```python
def myPow(self, x, n):
        """
        :type x: float
        :type n: int
        :rtype: float
        """

        # approach: recursive call n // 2 until n == 1 or -1

        if n == 0:
            return 1

        if n == 1:
            return x

        if n == -1:
            return 1 / x

        result = self.myPow(x, n // 2)

        return result * result * (x if n % 2 else 1)
```

