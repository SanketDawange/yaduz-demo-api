<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        try {
            $productCount = Product::count();
            $categoryCount = Category::count();

            return view('admin.home', compact('productCount', 'categoryCount'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function categories()
    {
        try {
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view('admin.categories', compact('categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function addCategory()
    {
        try {
            return view('admin.category.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function doAddCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return redirect()->route('categories')->with('success', 'Category added successfully.');
    }

    public function editCategory($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found.');
            }
            return view('admin.category.edit', compact('category'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function doEditCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'category_name' => 'required|max:255',
        ]);

        try {
            $category = Category::find($request->category_id);
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found!');
            }

            $category->name = $request->category_name;
            $category->save();

            return redirect()->route('categories')->with('success', 'Category updated successfully.');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }


    public function products()
    {
        try {
            $products = Product::orderBy('created_at', 'desc')->get();
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view('admin.products', compact('products', 'categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function addProduct()
    {
        try {
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view('admin.product.add', compact('categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function doAddProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:255',
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->product_price;
        $product->save();

        return redirect()->route('products')->with('success', 'Product added successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }
    public function editProduct($id)
    {
        try {

            $categories = Category::orderBy('created_at', 'desc')->get();
            $product = Product::find($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            return view('admin.product.edit', compact('product', 'categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function doEditProduct(Request $request)
    {
        try {
            $product = Product::find($request->product_id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found!');
            }

            $product->category_id = $request->category_id;
            $product->name = $request->product_name;
            $product->price = $request->product_price;
            $product->save();

            return redirect()->route('products')->with('success', 'Product updated successfully!');

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function viewProduct($id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            return view('admin.product.view', compact('product'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function viewCategory($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found.');
            }
            return view('admin.category.view', compact('category'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
