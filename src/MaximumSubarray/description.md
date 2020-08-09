# 53. Maximum Subarray

## Condition

Given an integer array `nums`, find the contiguous subarray (containing at least one number) which has the largest sum and return its sum.

**Example:**

```
Input: [-2,1,-3,4,-1,2,1,-5,4],
Output: 6
Explanation: [4,-1,2,1] has the largest sum = 6.
```

**Follow up:**

If you have figured out the O(*n*) solution, try coding another solution using the divide and conquer approach, which is more subtle.

## Условие

Для целочисленного массива `nums` найдите непрерывный подмассив (содержащий хотя бы одно число), имеющий наибольшую сумму, и верните его сумму.

**Пример:**

```
Input: [-2,1,-3,4,-1,2,1,-5,4],
Output: 6
Explanation: [4,-1,2,1] has the largest sum = 6.
```

**Предложение:**

Если вы нашли решение со сложностью O(*n*), попробуйте закодировать другое решение, используя подход «разделяй и властвуй», который является более утонченным.

## Решение. Алгоритм Кадане

https://www.geeksforgeeks.org/largest-sum-contiguous-subarray/

https://www.baeldung.com/java-maximum-subarray

Используем подход *sliding window*.

Двигаемся слева-направо и используем алгоритм:

- проверяем, не больше ли новое число `arr[i]`, чем сумма чисел в *sliding window* с этим числом `maxEndingHere + arr[i]`.
  - если больше, то откидываем все предыдущие числа из *sliding window* и помещаем в него только новое число `arr[i]`
  - если нет, то добавляем новое число `arr[i]` в *sliding window*.

- сравниваем текущую сумму чисел в sliding window с максимальной `maxEndingHere`

```java
public int maxSubArraySum(int[] arr) {
 
    int size = arr.length;
    int start = 0;
    int end = 0;
 
    int maxSoFar = 0, maxEndingHere = 0;
 
    for (int i = 0; i < size; i++) {
        if (arr[i] > maxEndingHere + arr[i]) {
            start = i;
            maxEndingHere = arr[i];
        } else
            maxEndingHere = maxEndingHere + arr[i];
 
        if (maxSoFar < maxEndingHere) {
            maxSoFar = maxEndingHere;
            end = i;
        }
    }
    logger.info("Found Maximum Subarray between {} and {}", start, end);
    return maxSoFar;
}
```

